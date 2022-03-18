<?php

namespace Modules\Master\Http\Livewire\Category;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Master\Entities\Category;

class Create extends Component
{
    /**
     * Define livewire wire:model
     *
     * @var mixed
     */
    public $name, $slug_name, $table_reference, $position;

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:191|' . Rule::unique('categories', 'name'),
            'slug_name' => 'required|max:191|' . Rule::unique('categories', 'slug_name'),
            'table_reference' => 'required|max:191',
            'position' => 'required|numeric|max:11',
        ];
    }

    public function updatedName($value)
    {
        return $this->slug_name = slug($value);
    }

    /**
     * Store categories to database at categories table
     *
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        // Insert Categories

        // Create Categories
        Category::create([
            'name' => $this->name,
            'slug_name' => $this->slug_name,
            'table_reference' => $this->table_reference,
            'position' => $this->position,
        ]);

        // Reset all props
        $this->reset();

        // Flash message
        session()->flash('success', 'Kategori berhasil ditambahkan.');
    }

    public function render()
    {
        return view('master::livewire.category.create');
    }
}