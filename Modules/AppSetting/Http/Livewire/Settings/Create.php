<?php

namespace Modules\AppSetting\Http\Livewire\Settings;

use App\Contracts\WithEditor;
use App\Contracts\WithImageUpload;
use App\Http\Livewire\Editor;
use App\Http\Livewire\ImageUpload;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\AppSetting\Services\SettingsQuery;

class Create extends Component
{
    use WithImageUpload, WithEditor;

    public $group, $key, $value, $type = 'string', $form_type = 'input';

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
            'key' => 'required|max:191|unique:app_settings,key',
            'type' => 'required|max:191|in:string,image',
            'form_type' => 'required|max:191|in:input,textarea,editor',
        ];
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
     * Store data to database
     *
     * @return void
     */
    public function store()
    {
        $validate = $this->rules();
        $validate['value'] = $this->type == 'image' ? 'required' : 'required|max:5000';

        $this->validate($validate);

        $data = [
            'group' => $this->group,
            'key' => $this->key,
            'value' => $this->value,
            'type' => $this->type,
            'form_type' => $this->form_type,
        ];

        // Update image
        SettingsQuery::create($data);

        Cache::forever($this->key, $this->value);

        $this->reset();
        $this->resetImageUpload();

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
    }

    public function render()
    {
        return view('appsetting::livewire.settings.create', [
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