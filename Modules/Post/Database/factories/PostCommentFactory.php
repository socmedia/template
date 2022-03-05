<?php
namespace Modules\Post\Database\factories;

use App\Models\User;
use App\Utillities\Generate;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        $user = User::all()->pluck('id')->toArray();

        $userId = [
            null,
            $user[rand(0, count($user) - 1)],
        ];

        $res = $userId[rand(0, 1)];
        $posts = Post::all()->pluck('id')->toArray();

        return [
            'id' => strtolower(Generate::ID(32)),
            'posts_id' => $posts[rand(0, count($posts) - 1)],
            'user_id' => $res,
            'name' => $res ? null : $this->faker->name(),
            'email' => $res ? null : $this->faker->email(),
            'number_of_likes' => rand(0, 200),
            'comment' => $this->faker->sentences(rand(1, 3), true),
        ];

    }
}
