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
        $user = [
            'id' => Generate::ID(32),
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()->toDateTimeString(),
        ];

        return User::insert($user);
    }
}