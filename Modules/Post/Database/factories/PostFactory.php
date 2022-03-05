<?php
namespace Modules\Post\Database\factories;

use App\Models\User;
use App\Utillities\Generate;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Post\Entities\Post::class;

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
        $title = $this->faker->words(4, true);
        $body = $this->faker->paragraphs(rand(10, 15), true);
        $user = User::all()->pluck('id')->toArray();
        $createdAt = $this->faker->dateTimeBetween('-5 years', 'now', 'Asia/Jakarta');

        return [
            'id' => strtolower(Generate::ID(32)),
            'title' => $title,
            'slug_title' => slug($title),
            'category_id' => rand(1, 2),
            'status_id' => rand(1, 3),
            'type_id' => rand(1, 3),
            'subject' => $this->faker->text(170),
            'description' => $body,
            'tags' => implode(',', $this->faker->words(rand(3, 5))),
            'reading_time' => round(str_word_count(strip_tags($body)) / 130, 1) . ' menit',
            'number_of_views' => rand(0, 200),
            'number_of_shares' => rand(0, 20),
            'author' => $user[rand(0, count($user) - 1)],
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
