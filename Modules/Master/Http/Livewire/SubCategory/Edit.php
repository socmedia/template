<?php

namespace Modules\Master\Http\Livewire\SubCategory;

use App\Constants\BoxIcons;
use App\Http\Livewire\ImageUpload;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Master\Entities\SubCategory;
use Modules\Master\Services\Category\CategoryQuery;
use Modules\Master\Services\SubCategory\SubCategoryQuery;

class Edit extends Component
{
    /**
     * Define form props in this component
     *
     * @var mixed
     */
    public $sub_category, $is_parent, $name, $slug_name, $position, $parent, $category, $icon, $image, $oldImage;
    /**
     * Define data props
     *
     * @var array
     */
    public $categories, $pluckCategories = [];
    public $sub_categories, $pluckSubCategories = [];
    public $with, $icon_type, $icons = [];

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount($sub_category)
    {
        $this->sub_category = $sub_category;

        // Get categories names
        $categories = Category::all();
        $categoryTableReferences = (new CategoryQuery())->getTableReferences();
        $pluckCategories = array_map(function ($category) {
            return $category['id'];
        }, $categories->toArray());

        $data = [];
        foreach ($categoryTableReferences as $reference) {
            $data[$reference->table_reference] = $categories->where('table_reference', $reference->table_reference);
        }

        $this->groupedCategories = $data;
        $this->categories = $categories;
        $this->pluckCategories = implode(',', $pluckCategories);

        // Get sub_categories names
        $sub_categories = (new SubCategoryQuery())->getParents();
        $pluckSubCategories = array_map(function ($sub_category) {
            return $sub_category['id'];
        }, $sub_categories->toArray());

        $this->sub_categories = $sub_categories;
        $this->pluckSubCategories = implode(',', $pluckSubCategories);

        $this->is_parent = $sub_category->parent ? false : true;
        $this->category = $sub_category->category_id;
        $this->name = $sub_category->name;
        $this->slug_name = $sub_category->slug_name;
        $this->parent = $sub_category->parent;
        $this->position = $sub_category->position;

        if ($sub_category->with_icon) {
            $this->with = 'icon';
            $this->icon = $sub_category->icon_class;
        }

        if ($sub_category->with_image) {
            $this->with = 'image';
            $this->image = $sub_category->media_path;
            $this->oldImage = $sub_category->media_path;
        }

    }

    /**
     * Form validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'category' => 'required|max:20|in:' . $this->pluckCategories,
            'name' => 'required|max:191',
            'slug_name' => 'required|max:191',
            'position' => 'required|max:11',
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

        if ($component == 'parent') {
            $category = Category::find($value);
            $this->category = $category ? $category->id : null;
            session()->flash('failed', 'Sub kategori tidak ditemukan.');
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
     * Update existing sub_categories at sub_categories table
     *
     * @return void
     */
    public function update()
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

        $data = [
            'name' => $this->name,
            'slug_name' => $this->slug_name,
        ];

        if ($this->is_parent) {
            $data['category_id'] = $this->category;
            $data['parent'] = null;
        } else {
            $data['category_id'] = $this->category;
            $data['parent'] = $this->parent;
        }

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

        // Update Sub Categories
        $sub_category = SubCategory::find($this->sub_category->id);
        $sub_category->update($data);

        // Flash message
        session()->flash('success', 'Sub Kategori berhasil diperbarui.');
    }

    public function render()
    {
        return view('master::livewire.sub-category.edit', [
            'boxicons' => BoxIcons::types(),
        ]);
    }
}