<?php

namespace Modules\Marketing\Http\Livewire\Client;

use App\Contracts\WithImageUpload;
use App\Http\Livewire\ImageUpload;
use Livewire\Component;
use Modules\Marketing\Entities\Client;

class Edit extends Component
{
    use WithImageUpload;

    /**
     * Form properties
     *
     * @var bool
     */
    public $client, $name, $image, $oldImage, $is_active;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        ImageUpload::EVENT_VALUE_UPDATED,
    ];

    public function mount($client)
    {
        $this->client = $client;
        $this->name = $client->name;
        $this->oldImage = $client->media_path;
        $this->is_active = $client->is_active ? true : false;
    }

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
    public function image_uploaded($value)
    {
        $this->image = $value;
    }

    /**
     * Update existing client
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'is_active' => $this->is_active ? 1 : 0,
        ];

        if ($this->image) {
            $data['media_path'] = $this->image;
        }

        $client = Client::find($this->client->id);
        $client->update($data);

        return session()->flash('success', 'Partner berhasil diperbarui');
    }

    public function render()
    {
        return view('marketing::livewire.client.edit');
    }
}