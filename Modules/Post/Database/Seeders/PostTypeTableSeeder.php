<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\PostType;

class PostTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $data = [
            [
                'name' => 'Berita',
                'slug_name' => 'berita',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blog',
                'slug_name' => 'blog',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tips & Tricks',
                'slug_name' => 'tips-tricks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PostType::insert($data);
    }
}
