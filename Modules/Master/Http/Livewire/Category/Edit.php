<?php

namespace Modules\Master\Http\Livewire\Category;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    /**
     * Define livewire wire:model
     *
     * @var mixed
     */
    public $category, $name, $slug_name, $table_reference, $position;

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:191|' . Rule::unique('categories', 'name')->ignore($this->category->id, 'id'),
            'slug_name' => 'required|max:191|' . Rule::unique('categories', 'slug_name')->ignore($this->category->id, 'id'),
            'table_reference' => 'required|max:191|',
            'position' => 'required|max:11|' . Rule::unique('categories', 'position')->ignore($this->category->id, 'id'),
        ];
    }

    /**
     * Define prop before component rendered
     *
     * @return void
     */
    public function mount($category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->slug_name = $category->slug_name;
        $this->table_reference = $category->table_reference;
        $this->position = $category->position;
    }

    public function updatedName($value)
    {
        return $this->slug_name = slug($value);
    }

    /**
     * Update existing categories at categories table
     *
     * @return void
     */
    public function update()
    {
        // Validation
        $this->validate();

        // Update Categories
        $this->category->update([
            'name' => $this->name,
            'slug_name' => $this->slug_name,
            'table_reference' => $this->table_reference,
            'position' => $this->position,
            'updated_at' => now(),
        ]);

        // Flash message
        session()->flash('success', 'Kategori berhasil diperbarui.');
    }

    public function render()
    {
        return view('master::livewire.category.edit');
    }
}