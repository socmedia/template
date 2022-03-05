<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\PostCategory;

class PostCategoryTableSeeder extends Seeder
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
                'name' => 'Informasi Publik',
                'slug_name' => 'informasi-publik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tempat Wisata',
                'slug_name' => 'Tempat Wisata',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PostCategory::insert($data);
    }
}
