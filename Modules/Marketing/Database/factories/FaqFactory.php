<?php
namespace Modules\Marketing\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Master\Entities\Category;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Marketing\Entities\Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::where('table_reference', 'faqs')->get(['id'])->pluck('id')->toArray();
        return [
            'category_id' => $category[array_rand($category)],
            'question' => implode(' ', $this->faker->words(random_int(3, 6))),
            'answer' => $this->faker->realText(random_int(80, 300)),
            'is_show' => random_int(0, 1),
        ];
    }
}
