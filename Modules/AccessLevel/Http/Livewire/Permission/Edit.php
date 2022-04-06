<?php

namespace Modules\AccessLevel\Http\Livewire\Permission;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    /**
     * Define livewire wire:model
     *
     * @var string
     */
    public $permission, $name, $guard = 'web';

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:199|' . Rule::unique('permissions', 'name')->ignore($this->permission->id),
        ];
    }

    /**
     * Define prop before component rendered
     *
     * @param  \Spatie\Permission\Models\Permission $permission
     * @return void
     */
    public function mount($permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
    }

    /**
     * Update existing permission at permissions table
     *
     * @return void
     */
    public function update()
    {
        // Validation
        $this->validate();

        // Update Permission
        $this->permission->update([
            'name' => $this->name,
            'guard_name' => $this->guard,
        ]);

        // Flash message
        session()->flash('success', 'Permission berhasil diperbarui.');
    }

    public function render()
    {
        return view('accesslevel::livewire.permission.edit');
    }
}