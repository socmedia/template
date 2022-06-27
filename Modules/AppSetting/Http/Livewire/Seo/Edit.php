<?php

namespace Modules\AppSetting\Http\Livewire\Seo;

use App\Contracts\WithImageUpload;
use App\Http\Livewire\ImageUpload;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\AppSetting\Entities\AppSetting;

class Edit extends Component
{
    use WithImageUpload;

    public $setting;

    public $group, $key, $alias, $value, $oldValue, $type, $form_type;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        ImageUpload::EVENT_VALUE_UPDATED,
    ];

    /**
     * Validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [];
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
        $this->alias = $setting->alias;
        $this->value = $setting->type == 'string' ? $setting->value : null;
        $this->oldValue = $setting->type == 'image' ? $setting->value : null;
        $this->type = $setting->type;
        $this->form_type = $setting->form_type;
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
        $setting = AppSetting::find($this->setting->id);
        $setting->update($data);

        Cache::forget($this->key);
        Cache::forever($this->key, $this->value);

        return session()->flash('success', 'Perubahan berhasil disimpan');
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
        return view('appsetting::livewire.seo.edit');
    }
}