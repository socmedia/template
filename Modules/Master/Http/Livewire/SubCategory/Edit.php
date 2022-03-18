<?php

namespace Modules\Master\Http\Livewire\SubCategory;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Master\Entities\SubCategory;

class Edit extends Component
{
    /**
     * Define form props in this component
     *
     * @var mixed
     */
    public $sub_category, $name, $slug_name, $position, $parent, $category;
    /**
     * Define data props
     *
     * @var array
     */
    public $categories, $pluckCategories = [];
    public $sub_categories, $pluckSubCategories = [];

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
        $pluckCategories = array_map(function ($category) {
            return $category['id'];
        }, $categories->toArray());

        $this->categories = $categories;
        $this->pluckCategories = implode(',', $pluckCategories);

        // Get sub_categories names
        $sub_categories = SubCategory::all();
        $pluckSubCategories = array_map(function ($sub_category) {
            return $sub_category['id'];
        }, $sub_categories->toArray());

        $this->sub_categories = $sub_categories;
        $this->pluckSubCategories = implode(',', $pluckSubCategories);

        $this->category = $sub_category->category->id;
        $this->name = $sub_category->name;
        $this->slug_name = $sub_category->slug_name;
        $this->parent = $sub_category->parent;
        $this->position = $sub_category->position;
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
            'name' => 'required|max:191|' . Rule::unique('sub_categories', 'name')->ignore($this->sub_category->id),
            'slug_name' => 'required|max:191|' . Rule::unique('sub_categories', 'slug_name')->ignore($this->sub_category->id),
            'position' => 'required|max:11|',
        ];
    }

    public function updatedName($value)
    {
        return $this->slug_name = slug($value);
    }

    /**
     * Update existing sub_categories at sub_categories table
     *
     * @return void
     */
    public function update()
    {
        // Validation
        $this->validate();

        // Update Sub Categories
        $this->sub_category->update([
            'category_id' => $this->category,
            'name' => $this->name,
            'slug_name' => $this->slug_name,
            'parent' => $this->parent ? $this->parent : null,
            'position' => $this->position,
            'updated_at' => now(),
        ]);

        // Flash message
        session()->flash('success', 'Sub Kategori berhasil diperbarui.');
    }

    public function render()
    {
        return view('master::livewire.sub-category.edit');
    }
}