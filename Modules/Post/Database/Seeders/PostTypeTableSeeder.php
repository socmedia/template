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
                'allow_column' => '["title", "slug_title", "thumbnail", "category", "type", "subject", "description", "tags", "author"]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blog',
                'slug_name' => 'blog',
                'allow_column' => '["title", "slug_title", "thumbnail", "category", "type", "subject", "description", "tags", "author"]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tips & Tricks',
                'slug_name' => 'tips-tricks',
                'allow_column' => '["title", "slug_title", "thumbnail", "category", "type", "subject", "description", "tags", "author"]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PostType::insert($data);
    }
}