<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostComment;
use Modules\Post\Entities\PostsView;
use Modules\Post\Entities\Tag;

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
        Post::factory()->count(350)->create();
        PostComment::factory()->count(1000)->create();
        PostsView::factory()->count(1500)->create();
        Tag::factory()->count(35)->create();
    }
}