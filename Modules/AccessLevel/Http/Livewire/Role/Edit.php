<?php

namespace Modules\AccessLevel\Http\Livewire\Role;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    /**
     * Define livewire wire:model
     *
     * @var string
     */
    public $role, $name, $guard = 'web';

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:199|' . Rule::unique('roles', 'name')->ignore($this->role->id),
        ];
    }

    /**
     * Define prop before component rendered
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return void
     */
    public function mount($role)
    {
        $this->role = $role;
        $this->name = $role->name;
    }

    /**
     * Update existing role at roles table
     *
     * @return void
     */
    public function update()
    {
        // Validation
        $this->validate();

        // Update Role
        $this->role->update([
            'name' => $this->name,
            'guard_name' => $this->guard,
        ]);

        // Flash message
        session()->flash('success', 'Role berhasil diperbarui.');
    }
    public function render()
    {
        return view('accesslevel::livewire.role.edit');
    }
}
