<?php
namespace Modules\Post\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\Post\Entities\Post;

class PostsViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Post\Entities\PostsView::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $createdAt = $this->faker->dateTimeBetween('-1 years', 'now', 'Asia/Jakarta');
        $posts = Post::published()->get()->pluck('id')->toArray();

        return [
            'ip_address' => $this->faker->ipv4(),
            'posts_id' => $posts[array_rand($posts)],
            'last_open_at' => Carbon::parse($createdAt)->addDays(rand(0, 200)),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];

    }
}