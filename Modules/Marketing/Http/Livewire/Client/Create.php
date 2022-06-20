<?php

namespace Modules\Marketing\Http\Livewire\Client;

use App\Contracts\WithImageFilepond;
use App\Http\Livewire\Filepond\Image;
use Livewire\Component;
use Modules\Marketing\Entities\Client;
use Modules\Marketing\Services\Client\ClientQuery;

class Create extends Component
{
    use WithImageFilepond;

    /**
     * Form properties
     *
     * @var bool
     */
    public $name, $image, $is_active = true;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Image::EVENT_VALUE_UPDATED,
    ];

    /**
     * Form validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:191',
            'image' => 'nullable',
            'is_active' => 'nullable|boolean',
        ];
    }

    /**
     * Hooks for image property
     * When image-upload has been updated,
     * Image property will be update
     *
     * @param  string $value
     * @return void
     */
    public function images_value_updated($value)
    {
        $this->image = $value;
    }

    /**
     * Store client to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $latest = (new ClientQuery())->getLastPosition();

        $data = [
            'name' => $this->name,
            'is_active' => $this->is_active ? 1 : 0,
            'position' => $latest ? $latest->position + 1 : 1,
        ];

        if ($this->image) {
            $data['media_path'] = $this->image;
        }

        Client::create($data);

        $this->reset(
            'name',
            'image',
            'is_active',
        );
        $this->resetImageFilepond();

        return session()->flash('success', 'Partner berhasil ditambahkan');
    }

    public function render()
    {
        return view('marketing::livewire.client.create');
    }
}
