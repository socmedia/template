<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Modules\Master\Entities\Category;
use Modules\Master\Services\Category\CategoryQuery;

class CategoryTableSeeder extends Seeder
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
                'name' => 'Polhukam',
                'slug_name' => slug('Polhukam'),
                'table_reference' => 'posts.berita',
                'position' => 1,
                'is_featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ekbis',
                'slug_name' => slug('Ekbis'),
                'table_reference' => 'posts.berita',
                'position' => 2,
                'is_featured' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kesehatan',
                'slug_name' => slug('Kesehatan'),
                'table_reference' => 'posts.berita',
                'position' => 3,
                'is_featured' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SosBud',
                'slug_name' => slug('SosBud'),
                'table_reference' => 'posts.berita',
                'position' => 4,
                'is_featured' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Science & Tech',
                'slug_name' => slug('Science & Tech'),
                'table_reference' => 'posts.berita',
                'position' => 5,
                'is_featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lifestyle',
                'slug_name' => slug('Lifestyle'),
                'table_reference' => 'posts.berita',
                'position' => 6,
                'is_featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Otomotif',
                'slug_name' => slug('Otomotif'),
                'table_reference' => 'posts.berita',
                'position' => 7,
                'is_featured' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hiburan',
                'slug_name' => slug('Hiburan'),
                'table_reference' => 'posts.berita',
                'position' => 8,
                'is_featured' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olahraga',
                'slug_name' => slug('Olahraga'),
                'table_reference' => 'posts.berita',
                'position' => 9,
                'is_featured' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Komunitas',
                'slug_name' => slug('Komunitas'),
                'table_reference' => 'posts.berita',
                'position' => 10,
                'is_featured' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Creative Corner',
                'slug_name' => slug('Creative Corner'),
                'table_reference' => 'posts.berita',
                'position' => 11,
                'is_featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Urban Legend',
                'slug_name' => slug('Urban Legend'),
                'table_reference' => 'posts.berita',
                'position' => 12,
                'is_featured' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $featured = (new CategoryQuery())->getFeatured('posts.berita', 10);
        Cache::forget('navigations');
        Cache::forever('navigations', $featured);

        Category::insert($data);
    }
}