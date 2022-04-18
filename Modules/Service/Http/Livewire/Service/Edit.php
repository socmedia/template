<?php

namespace Modules\Service\Http\Livewire\Service;

use App\Contracts\WithImageUpload;
use App\Http\Livewire\ImageUpload;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\Service\Entities\Service;

class Edit extends Component
{
    use WithImageUpload;

    /**
     * Define form props
     *
     * @var array
     */
    public $service, $thumbnail, $oldThumbnail, $name, $slug_name, $description, $duration, $terms_n_conditions;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        ImageUpload::EVENT_VALUE_UPDATED,
    ];

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:191|unique:services,name,' . $this->service->id,
            'slug_name' => 'required|max:191|unique:services,slug_name,' . $this->service->id,
            'thumbnail' => 'nullable',
            'description' => 'nullable',
            'duration' => 'nullable',
            'terms_n_conditions' => 'nullable',
        ];
    }

    public function mount($service)
    {
        $this->service = $service;
        $this->oldThumbnail = $service->thumbnail;
        $this->name = $service->name;
        $this->slug_name = $service->slug_name;
        $this->description = $service->description;
        $this->duration = $service->duration;
        $this->terms_n_conditions = $service->terms_n_conditions;
    }

    /**
     * Hooks for name property
     * Doing name validation after
     * Name property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedName($value)
    {
        $this->slug_name = slug($value);

        $this->validate([
            'name' => 'required|max:191|unique:services,name,' . $this->service->id,
            'slug_name' => 'required|max:191|unique:services,slug_name,' . $this->service->id,
        ]);
    }

    /**
     * Hooks for slug_name property
     * Doing slug_name validation after
     * Slug_name property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedSlugName($value)
    {
        $this->validate([
            'slug_name' => 'required|max:191|unique:services,slug_name,' . $this->service->id,
        ]);
    }

    /**
     * Hooks for thumbnail property
     * When image-upload has been updated,
     * Thumbnail property will be update
     *
     * @param  string $value
     * @return void
     */
    public function image_uploaded($value)
    {
        $this->thumbnail = $value;
    }

    /**
     * Update service method
     *
     * @return void
     */
    public function update()
    {
        // Validation
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug_name' => $this->slug_name,
            'description' => $this->description,
            'duration' => $this->duration,
            'terms_n_conditions' => $this->terms_n_conditions,
        ];

        if ($this->thumbnail) {
            $data['thumbnail'] = $this->thumbnail;
        }

        // Create Service
        $service = Service::find($this->service->id);
        $service->update($data);

        Cache::forget('backend_service');
        Cache::forever('backend_service', Service::all());

        $this->dispatchBrowserEvent('init');
        session()->flash('success', 'Service berhasil diperbarui.');
    }

    public function render()
    {
        return view('service::livewire.service.edit');
    }
}