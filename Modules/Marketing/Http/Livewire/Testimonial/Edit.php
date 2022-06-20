<?php

namespace Modules\Marketing\Http\Livewire\Testimonial;

use App\Contracts\WithImageFilepond;
use App\Http\Livewire\Filepond\Image;
use App\Services\ImageService;
use Livewire\Component;
use Modules\Marketing\Entities\Testimonial;

class Edit extends Component
{
    use WithImageFilepond;

    /**
     * Form properties
     *
     * @var bool
     */
    public $testimonial, $name, $image, $oldImage, $review, $is_active;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Image::EVENT_VALUE_UPDATED,
    ];

    public function mount($testimonial)
    {
        $this->testimonial = $testimonial;
        $this->name = $testimonial->name;
        $this->oldImage = $testimonial->media_path;
        $this->review = $testimonial->review;
        $this->is_active = $testimonial->is_active ? true : false;
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
            'review' => 'required|max:191',
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
     * Update existing testimonial
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'review' => $this->review,
            'is_active' => $this->is_active ? 1 : 0,
        ];

        $service = new ImageService();
        if ($this->image) {
            $path = explode('/', $this->oldImage);
            $shortPath = implode('/', array_slice($path, -2, 2));
            $service->removeImage('images', $shortPath);
            $data['media_path'] = $this->image;
        }

        $testimonial = Testimonial::find($this->testimonial->id);
        $testimonial->update($data);

        return session()->flash('success', 'Testimonial berhasil diperbarui');
    }

    public function render()
    {
        return view('marketing::livewire.testimonial.edit');
    }
}
