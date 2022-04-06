<?php

namespace Modules\AccessLevel\Http\Livewire\Permission;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    /**
     * Define livewire wire:model
     *
     * @var string
     */
    public $name, $guard = 'web';

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:199|' . Rule::unique('permissions', 'name'),
        ];
    }

    /**
     * Store permission to database at permissions table
     *
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        // Create Permission
        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard,
        ]);

        // Reset all props
        $this->reset();

        // Flash message
        session()->flash('success', 'Permission berhasil ditambahkan.');
    }

    public function render()
    {
        return view('accesslevel::livewire.permission.create');
    }
}