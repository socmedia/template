<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
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
        ];

        PostType::insert($data);

        Cache::forget('post_types');
        $postTypes = PostType::all();
        Cache::forever('post_types', $postTypes);
    }
}