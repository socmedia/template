<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(RegencyTableSeeder::class);
        $this->call(DistrictTableSeeder::class);

        /**
         * Villages table seeders add manualy to database,
         * because it will take a long time
         */
    }
}