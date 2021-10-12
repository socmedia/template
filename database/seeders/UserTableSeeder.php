<?php

namespace Database\Seeders;

use App\Models\User;
use App\Utillities\Generate;
use Illuminate\Database\Seeder;
use Modules\User\Models\Entities\UsersSetting;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev = User::create([
            'id' => Generate::ID(32),
            'name' => 'Developer',
            'email' => 'developer@app.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()->toDateTimeString(),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);

        $dev->assignRole('Developer');
        UsersSetting::create([
            'user_id' => $dev->id,
        ]);

        $admin = User::create([
            'id' => Generate::ID(32),
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()->toDateTimeString(),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);

        $admin->assignRole('Admin');
        UsersSetting::create([
            'user_id' => $admin->id,
        ]);

        $user = User::create([
            'id' => Generate::ID(32),
            'name' => 'User',
            'email' => 'user@app.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()->toDateTimeString(),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);

        $user->assignRole('User');
        UsersSetting::create([
            'user_id' => $user->id,
        ]);

    }
}
