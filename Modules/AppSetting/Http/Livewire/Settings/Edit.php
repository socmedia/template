<?php

namespace Modules\AppSetting\Http\Livewire\Settings;

use App\Contracts\WithEditor;
use App\Contracts\WithImageUpload;
use App\Http\Livewire\Editor;
use App\Http\Livewire\ImageUpload;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\AppSetting\Services\SettingsQuery;

class Edit extends Component
{
    use WithImageUpload, WithEditor;

    public $setting;

    public $group, $key, $value, $oldValue, $type, $form_type;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        ImageUpload::EVENT_VALUE_UPDATED,
        Editor::EVENT_VALUE_UPDATED,
    ];

    /**
     * Validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'group' => 'required|max:191',
            'key' => 'required|max:191|unique:app_settings,key,' . $this->setting->id,
            'type' => 'required|max:191|in:string,image',
            'form_type' => 'required|max:191|in:input,textarea,editor',
        ];
    }

    /**
     * Set default propeties value
     *
     * @param  \Modules\AppSetting\Entities\AppSetting $setting
     * @return void
     */
    public function mount($setting)
    {
        $this->setting = $setting;

        $this->group = $setting->group;
        $this->key = $setting->key;
        $this->value = $setting->type == 'string' ? $setting->value : null;
        $this->oldValue = $setting->type == 'image' ? $setting->value : null;
        $this->type = $setting->type;
        $this->form_type = $setting->form_type;
    }

    /**
     * Get all groups from database
     *
     * @return void
     */
    public function getGroups()
    {
        return (new SettingsQuery())->getGroupField();
    }

    /**
     * Update to database
     *
     * @return void
     */
    public function update()
    {
        $validate = $this->rules();
        $validate['value'] = $this->type == 'image' ? 'nullable' : 'required|max:5000';

        $this->validate($validate);

        $data = [
            'group' => $this->group,
            'key' => $this->key,
            'type' => $this->type,
            'form_type' => $this->form_type,
        ];

        if ($this->value) {
            $data['value'] = $this->value;
        }

        // Update image
        $this->setting->update($data);

        if ($this->value) {
            $data['value'] = $this->value;
        }

        Cache::forget($this->key);
        Cache::forever($this->key, $this->value);

        return session()->flash('success', 'Perubahan berhasil disimpan');
    }

    /**
     * Hooks for description property
     * When editor editor has been updated,
     * Description property will be update
     *
     * @param  string $value
     * @return void
     */
    public function editor_value_updated($value)
    {
        $this->value = $value;
    }

    /**
     * Hooks for value property
     * When image-upload has been updated,
     * Value property will be update
     *
     * @param  string $value
     * @return void
     */
    public function image_uploaded($value)
    {
        $this->value = $value;
        $this->oldValue = null;
    }

    public function render()
    {
        return view('appsetting::livewire.settings.edit', [
            'groups' => $this->getGroups(),
            'types' => [
                'string', 'image',
            ],
            'form_types' => [
                'input', 'textarea', 'editor',
            ],
        ]);
    }
}