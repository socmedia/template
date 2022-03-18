<?php

namespace App\Http\Livewire;

use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    use WithFileUploads;

    public $images, $uploadedImages, $oldImages, $multiple, $rulesText, $height;

    public $validator = [
        'rules' => null,
        'messages' => null,
        'attributes' => null,
    ];

    const EVENT_VALUE_UPDATED = 'image_uploaded';

    protected $listeners = [
        'reset_image' => 'resetImage',
    ];

    public function validateImage($image)
    {
        $rules = $this->validator['rules'] ?: null;
        $messages = $this->validator['messages'] ?: [];
        $attributes = $this->validator['attributes'] ?: null;

        if (is_array($image)) {
            $rules ?: $rules['images.*'] = 'required|mimes:jpg,jpeg,png|max:256';
            $messages ?: $messages['max'] = ':attribute must not be greater than :max kb.';
            $attributes ?: $attributes['images.*'] = 'Images';
        } else {
            $rules ?: $rules['images'] = 'required|mimes:jpg,jpeg,png|max:256';
            $messages ?: $messages['max'] = ':attribute must not be greater than :max kb.';
            $attributes ?: $attributes['images'] = 'Images';
        }

        return $this->validate($rules, $messages, $attributes);
    }

    public function mount($images, $oldImages = null, $height = '80px', $multiple = false, $rulesText = null, $validator = [
        'rules' => null,
        'messages' => null,
        'attributes' => null,
    ]) {
        $this->multiple = $multiple;
        $this->oldImages = $oldImages;
        $this->height = $height;
        $this->validator = $validator;
        if ($multiple) {
            $this->images = is_array($images) ? $images : [];
        } else {
            $this->images = $images;
        }
    }

    public function updatedImages($value)
    {
        $service = new ImageService();

        $this->validateImage($value);

        if (is_array($value)) {
            foreach ($value as $i => $image) {
                $uploaded = url($service->storeImage($image));
                $this->uploadedImages[$i] = $uploaded;
            }
        } else {
            $uploaded = url($service->storeImage($value));
            $this->uploadedImages = $uploaded;
        }

        $this->emit(self::EVENT_VALUE_UPDATED, $this->uploadedImages);
    }

    public function removeImage($isArray = false, $index = null)
    {
        $service = new ImageService();

        if (is_array($this->images)) {
            if ($isArray) {
                if (is_array($this->images[$index])) {
                    $path = explode('/', $this->images[$index]);
                    $shortPath = implode('/', array_slice($path, -2, 2));
                    $service->removeImage('images', $shortPath);
                }
                unset($this->images[$index]);
            } else {
                $path = explode('/', $this->images);
                $shortPath = implode('/', array_slice($path, -2, 2));
                $service->removeImage('images', $shortPath);
                $this->images = null;
            }
        } else {
            $this->reset('images', 'uploadedImages', 'oldImages');
        }

        $this->emit(self::EVENT_VALUE_UPDATED, $this->images);
    }

    public function resetImage()
    {
        $this->reset('images', 'uploadedImages', 'oldImages');
        $this->dispatchBrowserEvent('reset_image');
    }

    public function render()
    {
        return view('livewire.image-upload');
    }
}