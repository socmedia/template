<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\PostStatus;

class PostStatusTableSeeder extends Seeder
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
                'name' => 'Draft',
                'slug_name' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Published',
                'slug_name' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Archive',
                'slug_name' => 'archive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PostStatus::insert($data);
    }
}