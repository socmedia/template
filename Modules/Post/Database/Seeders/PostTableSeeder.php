<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostComment;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Post::factory()->count(150)->create();
        PostComment::factory()->count(1000)->create();
    }
}