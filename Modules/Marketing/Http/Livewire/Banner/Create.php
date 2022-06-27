<?php

namespace Modules\Marketing\Http\Livewire\Banner;

use App\Constants\BackgroundPosition;
use App\Contracts\WithImageFilepond;
use App\Http\Livewire\Filepond\Image;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Marketing\Entities\Banner;

class Create extends Component
{
    use WithImageFilepond;

    public $thumbnail, $type = 'image', $name, $alt, $reference_url, $is_active = true, $position,
    $background_position, $with_caption, $caption_title, $caption_text, $with_button, $button_text = 'Jelajahi', $button_link;

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
            'name' => 'required|max:191|unique:banners',
            'alt' => 'nullable|max:191',
            'reference_url' => 'nullable|url',
            'is_active' => 'nullable|boolean',
            'background_position' => 'nullable|max:191|in:' . $this->pluckBackgroundPositions,
            'caption_title' => 'nullable|max:191',
            'caption_text' => 'nullable|max:500',
            'button_text' => 'nullable|max:191',
            'button_link' => 'nullable|max:191',
        ];
    }

    public function mount()
    {
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

    public function store()
    {
        $this->validate();

        $latestPosition = Banner::orderBy('position', 'desc')->first(['position']);

        $data = [
            'banner_type' => $this->type,
            'name' => $this->name,
            'alt' => $this->alt,
            'placement_route' => 'homepage',
            'references_url' => $this->reference_url,
            'position' => $latestPosition ? $latestPosition->position + 1 : 1,
            'is_active' => $this->is_active ? 1 : 0,
            'desktop_background_position' => $this->background_position ?: null,
            'with_caption' => $this->with_caption ? 1 : 0,
            'caption_title' => $this->caption_title,
            'caption_text' => $this->caption_text,
            'with_button' => $this->with_button ? 1 : 0,
            'button_text' => $this->button_text,
            'button_link' => $this->button_link,
        ];

        // $data['desktop_media_path'] = $this->thumbnail ?
        // url($service->storeImage($this->thumbnail, 1920, 100)) :
        // asset('assets/public/images/banner_dummy.png');

        // $data['mobile_media_path'] = $this->thumbnail ?
        // url($service->storeImage($this->thumbnail, 1920, 100)) :
        // asset('assets/public/images/banner_dummy.png');

        if ($this->thumbnail) {
            $data['desktop_media_path'] = $this->thumbnail;
            $data['mobile_media_path'] = $this->thumbnail;
        }

        Banner::create($data);

        $this->reset();
        $this->resetImageFilepond();

        return session()->flash('success', 'Banner berhasil ditambahkan.');
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

    public function render()
    {
        $publicRoutes = [];
        foreach (Route::getRoutes()->getIterator() as $route) {
            if (Str::contains($route->getName(), 'front')) {
                array_push($publicRoutes, [
                    'name' => $route->getName(),
                    'uri' => $route->uri,
                ]);
            }
        }

        return view('marketing::livewire.banner.create', [
            'routes' => null,
            'public_routes' => $publicRoutes,
        ]);
    }
}
