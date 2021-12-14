<?php

namespace Modules\AccessLevel\Http\Livewire\Role;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

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
            'name' => 'required|min:3|max:199|' . Rule::unique('roles', 'name'),
        ];
    }

    /**
     * Store role to database at roles table
     *
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        // Create Role
        Role::create([
            'name' => $this->name,
            'guard_name' => $this->guard,
        ]);

        // Reset all props
        $this->reset();

        // Flash message
        session()->flash('success', 'Role berhasil ditambahkan.');
    }

    public function render()
    {
        return view('accesslevel::livewire.role.create');
    }
}