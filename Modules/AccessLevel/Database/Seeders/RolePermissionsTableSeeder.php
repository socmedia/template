<?php

namespace Modules\AccessLevel\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // $this->call("OthersTableSeeder");

        $role_admin = Role::where('name', 'Admin')->first();
        $role_developer = Role::where('name', 'Developer')->first();

        $permissions = Permission::pluck('id', 'id')->all();

        $role_admin->syncPermissions($permissions);
        $role_developer->syncPermissions($permissions);
    }
}
