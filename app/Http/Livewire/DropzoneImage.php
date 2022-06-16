<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class DropzoneImage extends Component
{
    const EVENT_VALUE_UPDATED = 'images_value_updated';

    public $component_id;
    public $value;
    public $uploaded_image;

    public function mount($value = '')
    {
        $this->component_id = 'images-' . Str::random(5);
        $this->value = $value;
    }

    protected $listeners = [
        'reset_images' => 'resetImages',
    ];

    public function updated($component, $value)
    {
        if ($component == 'uploaded_image') {
            $this->emit(self::EVENT_VALUE_UPDATED, $value);
        }
    }

    public function resetImages()
    {
        $this->reset('value');
        $this->dispatchBrowserEvent('reset_images', [
            'target' => $this->component_id,
            'input' => 'input#' . $this->component_id,
        ]);
    }

    public function render()
    {
        return view('livewire.dropzone-image');
    }
}