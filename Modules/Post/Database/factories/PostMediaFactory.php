<?php
namespace Modules\Post\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Post\Entities\Post;

class PostMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Post\Entities\PostMedia::class;

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
        $type = [
            'thumbnail',
            'body',
        ];

        $mediaType = [
            'image',
            'video',
        ];

        $posts = Post::all()->pluck('id')->toArray();

        return [
            'posts_id' => $posts[rand(0, count($posts) - 1)],
            'type' => $type[rand(0, 1)],
            'media_type' => $mediaType[rand(0, 1)],
            'media_path' => $this->faker->imageUrl(),
            'media_source' => 'astra motor jawa tengah',
        ];

    }
}
