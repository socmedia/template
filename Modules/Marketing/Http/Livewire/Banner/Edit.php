<?php

namespace Modules\Marketing\Http\Livewire\Banner;

use App\Constants\BackgroundPosition;
use App\Contracts\WithImageFilepond;
use App\Http\Livewire\Filepond\Image;
use App\Services\ImageService;
use Livewire\Component;
use Modules\Marketing\Entities\Banner;

class Edit extends Component
{
    use WithImageFilepond;

    public $banner, $oldThumbnail, $thumbnail, $type = 'image', $name, $alt, $reference_url, $position, $is_active = true,
    $background_position, $with_caption, $caption_title, $caption_text, $with_button, $button_text, $button_link;

    public $backgroundPositions = [], $pluckBackgroundPositions = null;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Image::EVENT_VALUE_UPDATED,
    ];

    protected function rules()
    {
        return [
            'thumbnail' => 'required',
            'name' => 'required|max:191|unique:banners,id,' . $this->banner->id . ',id',
            'alt' => 'nullable|max:191',
            'reference_url' => 'nullable|url',
            'is_active' => 'nullable|boolean',
            'position' => 'numeric|max:20',
            'background_position' => 'nullable|max:191|in:' . $this->pluckBackgroundPositions,
            'caption_title' => 'nullable|max:191',
            'caption_text' => 'nullable|max:500',
            'button_text' => 'nullable|max:191',
            'button_link' => 'nullable|max:191',
        ];
    }

    /**
     * Hooks for thumbnail property
     * When image-upload has been updated,
     * Thumbnail property will be update
     *
     * @param  string $value
     * @return void
     */
    public function images_value_updated($value)
    {
        $this->thumbnail = $value;
    }

    public function mount($banner)
    {
        $this->banner = $banner;
        $this->oldThumbnail = $banner->desktop_media_path;
        $this->name = $banner->name;
        $this->alt = $banner->alt;
        $this->reference_url = $banner->references_url;
        $this->is_active = $banner->is_active;
        $this->position = $banner->position;
        $this->with_caption = $banner->with_caption;
        $this->background_position = $banner->desktop_background_position;
        $this->caption_title = $banner->caption_title;
        $this->caption_text = $banner->caption_text;
        $this->with_button = $banner->with_button;
        $this->button_text = $banner->button_text;
        $this->button_link = $banner->button_link;

        $backgroundPositions = BackgroundPosition::all();
        $this->backgroundPositions = $backgroundPositions;

        $pluckBackgroundPositions = array_map(function ($position) {
            return $position['value'];
        }, $backgroundPositions);

        $this->pluckBackgroundPositions = implode(',', $pluckBackgroundPositions);
    }

    public function updatedName($value)
    {
        $this->alt = $value;
    }

    public function update()
    {
        $this->validate();

        $service = new ImageService();

        $data = [
            'banner_type' => $this->type,
            'name' => $this->name,
            'alt' => $this->alt,
            'references_url' => $this->reference_url,
            'position' => $this->position,
            'is_active' => $this->is_active ? 1 : 0,
            'desktop_background_position' => $this->background_position ?: null,
            'with_caption' => $this->with_caption ? 1 : 0,
            'caption_title' => $this->caption_title,
            'caption_text' => $this->caption_text,
            'with_button' => $this->with_button ? 1 : 0,
            'button_text' => $this->button_text,
            'button_link' => $this->button_link,
        ];

        if ($this->thumbnail) {
            $path = explode('/', $this->oldThumbnail);
            $shortPath = implode('/', array_slice($path, -2, 2));
            $service->removeImage('images', $shortPath);
            // $data['desktop_media_path'] = url($service->storeImage($this->thumbnail, 1920, 100));
            $data['desktop_media_path'] = $this->thumbnail;
        }

        $this->banner->update($data);

        return session()->flash('success', 'Banner berhasil diperbarui.');
    }

    public function render()
    {
        return view('marketing::livewire.banner.edit');
    }
}
