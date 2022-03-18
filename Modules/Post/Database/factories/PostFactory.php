<?php
namespace Modules\Post\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\Master\Entities\Category;
use Modules\Post\Entities\PostType;

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
        $title = $this->faker->words(rand(4, 8), true);
        $body = $this->faker->paragraphs(rand(10, 30), true);
        $user = User::all('id')->pluck('id')->toArray();
        $categories = Category::all('id')->pluck('id')->toArray();
        $types = PostType::all('id')->pluck('id')->toArray();
        $createdAt = $this->faker->dateTimeBetween('-5 years', 'now', 'Asia/Jakarta');

        $arrPublished = [
            Carbon::parse($createdAt)->addDays(rand(0, 300)),
            null,
        ];

        $randPublished = $arrPublished[array_rand($arrPublished)];

        return [
            'id' => Str::random(32),
            'title' => $title,
            'slug_title' => slug($title),
            'category_id' => $categories[array_rand($categories)],
            'type_id' => $types[array_rand($types)],
            'thumbnail' => $this->faker->imageUrl(),
            'subject' => $this->faker->text(170),
            'description' => $body,
            'tags' => implode(',', $this->faker->words(rand(3, 5))),
            'reading_time' => round(str_word_count(strip_tags($body)) / 130, 1) . ' menit',
            'number_of_views' => rand(0, 200),
            'number_of_shares' => rand(0, 20),
            'author' => $user[rand(0, count($user) - 1)],
            'published_at' => $randPublished,
            'archived_at' => $randPublished ? null : $arrPublished[0],
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
