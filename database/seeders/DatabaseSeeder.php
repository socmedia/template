<?php

namespace Database\Seeders;

use Database\Seeders\DistrictTableSeeder;
use Database\Seeders\ProvinceTableSeeder;
use Database\Seeders\RegencyTableSeeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\UserTableSeeder;
use Illuminate\Database\Seeder;
use Modules\AccessLevel\Database\Seeders\PermissionsTableSeeder;
use Modules\AccessLevel\Database\Seeders\RolePermissionsTableSeeder;
use Modules\AppSetting\Database\Seeders\AppSettingTableSeeder;
use Modules\Master\Database\Seeders\MasterDatabaseSeeder;
use Modules\Post\Database\Seeders\PostDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(AppSettingTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(RegencyTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(MasterDatabaseSeeder::class);
        $this->call(PostDatabaseSeeder::class);

        /**
         * Villages table seeders add manualy to database,
         * because it will take a long time
         */
    }
}
