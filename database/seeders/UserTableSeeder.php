<?php

namespace Database\Seeders;

use App\Models\User;
use App\Utillities\Generate;
use Illuminate\Database\Seeder;

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
    }
}