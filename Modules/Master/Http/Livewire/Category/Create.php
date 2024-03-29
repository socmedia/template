<?php

namespace Modules\Master\Http\Livewire\Category;

use App\Constants\BoxIcons;
use App\Contracts\WithImageUpload;
use App\Http\Livewire\ImageUpload;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Master\Entities\SubCategory;
use Modules\Master\Services\Category\CategoryQuery;

class Create extends Component
{
    use WithImageUpload;

    /**
     * Define livewire wire:model
     *
     * @var mixed
     */
    public $name, $slug_name, $table_reference, $icon, $image, $is_featured = 0;

    public $with, $icon_type, $icons = [];

    /**
     * Define validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'slug_name' => 'required|max:191',
            'table_reference' => 'required|max:191',
        ];
    }

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        ImageUpload::EVENT_VALUE_UPDATED,
    ];

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
        $this->image = $value;
    }

    public function updated($component, $value)
    {
        if ($component == 'name') {
            $this->slug_name = slug($value);
        }

        if ($component == 'with') {
            $this->reset('icon');
            $this->reset('image');
        }

        if ($component == 'icon_type') {

            if (!in_array($value, BoxIcons::types())) {
                $this->icons = [];
            }

            if ($value == 'regular') {
                $this->icons = BoxIcons::regular();
            }

            if ($value == 'solid') {
                $this->icons = BoxIcons::solid();
            }

            if ($value == 'logo') {
                $this->icons = BoxIcons::logo();
            }
        }

        if (!in_array($this->with, [null, 'icon', 'image'])) {
            session()->flash('failed', 'Jenis media tidak tersedia. Sistem hanya meenyediakan icon dan gambar.');
            $this->reset('with');
        }
    }

    /**
     * Set icon property with value given
     *
     * @param  string $value
     * @return void
     */
    public function setIcon($value)
    {
        return $this->icon = $value;
    }

    /**
     * Store categories to database at categories table
     *
     * @return void
     */
    public function store()
    {
        $rules = $this->rules();
        if ($this->with == 'icon') {
            $rules['icon'] = 'required';
        }

        if ($this->with == 'image') {
            $rules['image'] = 'required';
        }

        // Validation
        $this->validate($rules);

        $lastPosition = (new CategoryQuery())->getLastPosition($this->table_reference);
        $position = !$lastPosition->first() ? 1 : $lastPosition->position + 1;

        $data = [
            'name' => $this->name,
            'slug_name' => $this->slug_name,
            'table_reference' => $this->table_reference,
            'position' => $position,
            'is_featured' => $this->is_featured,
        ];
        if ($this->with == 'icon') {
            $data['with_icon'] = 1;
            $data['icon_class'] = $this->icon;
            $data['with_image'] = 0;
            $data['media_path'] = null;
        }

        if ($this->with == 'image') {
            $data['with_icon'] = 0;
            $data['icon_class'] = null;
            $data['with_image'] = 1;
            $data['media_path'] = $this->image;
        }

        // Create Categories
        Category::create($data);

        $featured = (new CategoryQuery())->getByTableReference('posts.berita');
        Cache::forget('categories');
        Cache::forever('categories', $featured);

        // Reset all props
        $this->reset();

        // Flash message
        session()->flash('success', 'Kategori berhasil ditambahkan.');
    }

    public function render()
    {
        return view('master::livewire.category.create', [
            'boxicons' => BoxIcons::types(),
            'table_references' => (new CategoryQuery())->getTableReferences(),
            'sub_categories' => SubCategory::all(['id', 'name']),
        ]);
    }
}
