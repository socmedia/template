<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Master\Entities\SubCategory;

class SubCategoryTableSeeder extends Seeder
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
                'category_id' => 1,
                'name' => 'Politik',
                'slug_name' => slug('Politik'),
                'position' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'Hukum & Keamanan',
                'slug_name' => slug('Hukum & Keamanan'),
                'position' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Ekonomi',
                'slug_name' => slug('Ekonomi'),
                'position' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Bisnis',
                'slug_name' => slug('Bisnis'),
                'position' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Sosial',
                'slug_name' => slug('Sosial'),
                'position' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Seni Budaya',
                'slug_name' => slug('Seni Budaya'),
                'position' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'name' => 'Science',
                'slug_name' => slug('Science'),
                'position' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'name' => 'IT',
                'slug_name' => slug('IT'),
                'position' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'name' => 'Family',
                'slug_name' => slug('Family'),
                'position' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'name' => 'Beauty',
                'slug_name' => slug('Beauty'),
                'position' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'name' => 'Fashion',
                'slug_name' => slug('Fashion'),
                'position' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'name' => 'Travel',
                'slug_name' => slug('Travel'),
                'position' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'name' => 'Foodies',
                'slug_name' => slug('Foodies'),
                'position' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'name' => 'Showbiz',
                'slug_name' => slug('Showbiz'),
                'position' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'name' => 'Seleb',
                'slug_name' => slug('Seleb'),
                'position' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'name' => 'Musik',
                'slug_name' => slug('Musik'),
                'position' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'name' => 'Influencer',
                'slug_name' => slug('Influencer'),
                'position' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 11,
                'name' => 'DIY',
                'slug_name' => slug('DIY'),
                'position' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 11,
                'name' => 'Social Experiment',
                'slug_name' => slug('Social Experiment'),
                'position' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 11,
                'name' => 'How To',
                'slug_name' => slug('How To'),
                'position' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 11,
                'name' => 'Digi-Life',
                'slug_name' => slug('Digi-Life'),
                'position' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        SubCategory::insert($data);
    }
}