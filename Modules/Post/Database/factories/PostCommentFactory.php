<?php
namespace Modules\Post\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Post\Entities\Post;

class PostCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Post\Entities\PostComment::class;

    protected function withFaker()
    {
        return \Faker\Factory::create('en');
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();

        $userId = [
            null,
            $users[array_rand($users)],
        ];

        $res = $userId[array_rand($userId)];
        $posts = Post::published()->get()->pluck('id')->toArray();

        return [
            'id' => Str::random(8),
            'posts_id' => $posts[array_rand($posts)],
            'user_id' => $res,
            'name' => $res ? null : $this->faker->name(),
            'email' => $res ? null : $this->faker->email(),
            'number_of_likes' => rand(0, 200),
            'comment' => $this->faker->sentences(rand(1, 3), true),
        ];

    }
}