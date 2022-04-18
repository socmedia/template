<?php

namespace Modules\Service\Http\Livewire\Service;

use App\Contracts\WithImageUpload;
use App\Http\Livewire\ImageUpload;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\Service\Entities\Service;
use Modules\Service\Services\Service\ServiceQuery;

class Create extends Component
{
    use WithImageUpload;

    /**
     * Define form props
     *
     * @var array
     */
    public $thumbnail, $name, $slug_name, $description, $duration, $terms_n_conditions;

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
            'name' => 'required|max:191|unique:services,name',
            'slug_name' => 'required|max:191|unique:services,slug_name',
            'thumbnail' => 'required',
            'description' => 'nullable',
            'duration' => 'nullable',
            'terms_n_conditions' => 'nullable',
        ];
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
            'name' => 'required|max:191|unique:services,name',
            'slug_name' => 'required|max:191|unique:services,slug_name',
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
            'slug_name' => 'required|max:191|unique:services,slug_name',
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
     * Store service method
     *
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        $lastPosition = (new ServiceQuery())->getLastPosition();
        $position = $lastPosition ? $lastPosition->position + 1 : 1;

        $data = [
            'name' => $this->name,
            'slug_name' => $this->slug_name,
            'position' => $position,
            'description' => $this->description,
            'duration' => $this->duration,
            'terms_n_conditions' => $this->terms_n_conditions,
        ];

        if ($this->thumbnail) {
            $data['thumbnail'] = $this->thumbnail;
        }

        // Create Service
        Service::create($data);

        Cache::forget('backend_service');
        Cache::forever('backend_service', Service::all());

        // Reset props
        $this->reset(
            'name',
            'slug_name',
            'description',
            'duration',
            'terms_n_conditions',
        );

        // Emit to trix editor, reset image upload
        $this->resetImageUpload();
        $this->dispatchBrowserEvent('init');

        session()->flash('success', 'Service berhasil ditambahkan.');
    }

    public function render()
    {
        return view('service::livewire.service.create');
    }
}