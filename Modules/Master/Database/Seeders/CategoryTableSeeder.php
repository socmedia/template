<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Master\Entities\Category;

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
                'name' => 'Umum',
                'slug_name' => slug('Umum'),
                'table_reference' => 'posts',
                'position' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Informasi',
                'slug_name' => slug('Informasi'),
                'table_reference' => 'posts',
                'position' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($data);
    }
}