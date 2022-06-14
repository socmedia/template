<?php

namespace Modules\AccessLevel\Http\Livewire\Role;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\AccessLevel\Services\Permission\PermissionQuery;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    /**
     * Define livewire wire:model
     *
     * @var string
     */
    public $role, $name, $permissions = [], $groups = [], $guard = 'web';

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

        $rolePermissions = (new PermissionQuery())->separateByGroup($role->permissions);
        $separateByGroup = (new PermissionQuery())->separateByGroup();

        if (!$role->permissions->isEmpty()) {
            $groups = [];
            $permissionsGroups = [];
            foreach ($separateByGroup['permissionsGroups'] as $key => $permissions) {
                if (count($permissions) == count($rolePermissions['permissionsGroups'][$key])) {
                    $groups[$key] = true;
                } else {
                    $groups[$key] = false;
                }

                foreach ($permissions as $permissionKey => $permission) {
                    if (array_key_exists($permissionKey, $rolePermissions['permissionsGroups'][$key])) {
                        $permissionsGroups[$key][$permissionKey] = true;
                    } else {
                        $permissionsGroups[$key][$permissionKey] = false;
                    }
                }
            }

            $this->groups = $groups;
            $this->permissions = $permissionsGroups;
        } else {
            $this->groups = $separateByGroup['groups'];
            $this->permissions = $separateByGroup['permissionsGroups'];
        }
    }

    public function updated($component, $value)
    {
        if (Str::contains($component, 'groups')) {
            $explode = explode('.', $component);
            foreach ($this->permissions[$explode[1]] as $permissionKey => $permission) {
                if ($value) {
                    $this->permissions[$explode[1]][$permissionKey] = true;
                } else {
                    $this->permissions[$explode[1]][$permissionKey] = false;
                }
            }
        }
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
        $role = Role::find($this->role->id);

        $role->update([
            'name' => $this->name,
            'guard_name' => $this->guard,
        ]);

        $permissions = [];
        foreach ($this->permissions as $key => $group) {
            foreach ($group as $permissionKey => $permission) {
                if ($permission) {
                    array_push($permissions, $key . '.' . $permissionKey);
                }
            }
        }

        $role->syncPermissions($permissions);

        // Flash message
        session()->flash('success', 'Role berhasil diperbarui.');
    }

    public function render()
    {
        return view('accesslevel::livewire.role.edit');
    }
}