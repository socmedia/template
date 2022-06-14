<?php

namespace Modules\AccessLevel\Http\Livewire\Role;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\AccessLevel\Services\Permission\PermissionQuery;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    /**
     * Define livewire wire:model
     *
     * @var string
     */
    public $name, $permissions = [], $groups = [], $guard = 'web';

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

    public function mount()
    {
        $separateByGroup = (new PermissionQuery())->separateByGroup();
        $this->groups = $separateByGroup['groups'];
        $this->permissions = $separateByGroup['permissionsGroups'];
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
     * Store role to database at roles table
     *
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        // Create Role
        $role = Role::create([
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