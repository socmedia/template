<?php

namespace App\Http\Livewire;

use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Trix extends Component
{
    use WithFileUploads;

    const EVENT_VALUE_UPDATED = 'trix_value_updated';
    const ELEMENT_VALUE_UPDATED = 'element_value_updated';
    public $elementName = 'description';

    public $value;
    public $trixId;
    public $images = [];

    protected $listeners = [
        'reset_trix' => 'resetTrix',
    ];

    public function mount($name = '', $value = '')
    {
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid();

        if ($name) {
            $this->elementName = $name;
        }
    }

    public function updatedValue($value)
    {
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
        $this->emit(self::ELEMENT_VALUE_UPDATED, [
            'element_name' => $this->elementName,
            'value' => $value,
        ]);
    }

    public function completeUpload(string $uploadedUrl, string $trixUploadCompletedEvent)
    {
        $service = new ImageService();

        foreach ($this->images as $image) {
            if ($image->getFilename() == $uploadedUrl) {
                // store in the public/images location
                $imageUrl = $service->storeImage($image);

                $this->dispatchBrowserEvent($trixUploadCompletedEvent, [
                    'url' => url($imageUrl),
                    'href' => url($imageUrl),
                ]);
            }
        }
    }

    public function resetTrix()
    {
        $this->reset('value');
        $this->dispatchBrowserEvent('reset_trix', [
            'target' => $this->trixId,
            'input' => 'input#' . $this->trixId,
        ]);
    }

    public function render()
    {
        return view('livewire.trix');
    }
}