<?php

namespace Modules\Master\Http\Livewire\SubCategory;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Master\Entities\SubCategory;

class Create extends Component
{
    /**
     * Define form props in this component
     *
     * @var mixed
     */
    public $name, $slug_name, $position, $parent, $category;
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
    public function mount()
    {
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
            'name' => 'required|max:191|' . Rule::unique('sub_categories', 'name'),
            'slug_name' => 'required|max:191|' . Rule::unique('sub_categories', 'slug_name'),
            'position' => 'required|max:11|',
        ];
    }

    public function updatedName($value)
    {
        return $this->slug_name = slug($value);
    }

    /**
     * Store new sub_categories to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        // Create new sub_categories
        $sub_categories = SubCategory::create([
            'category_id' => $this->category,
            'name' => $this->name,
            'slug_name' => $this->slug_name,
            'parent' => $this->parent,
            'position' => $this->position,
        ]);

        // Reset all props
        $this->reset(
            'category',
            'name',
            'slug_name',
            'parent',
            'position'
        );

        // Flash message
        session()->flash('success', 'Sub Kategori berhasil ditambahkan.');
    }

    public function render()
    {
        return view('master::livewire.sub-category.create');
    }
}