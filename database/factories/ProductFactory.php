<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomDigitNotZero(),
            'name' => $this->faker->word(),
            'slug' => $this->faker->word(),
            'status' => $this->faker->word(),
            'type' => $this->faker->word(),
            'sku' => $this->faker->unique()->bothify('?###??##'),
            'regular_price' => $this->faker->randomFloat(1),
            'description' => $this->faker->sentence(),
            'summary' => $this->faker->sentence(),
            'sale_price' => $this->faker->randomFloat(1),
            'purchase_note' => $this->faker->sentence(),
            'sell_button_text' => $this->faker->word(),
            'tags' => $this->faker->word(),
            'downloadable' => $this->faker->randomDigitNotZero(),
            'sale_start_date' => $this->faker->date(),
            'sale_end_date' => $this->faker->date(),
            'publish_at' => $this->faker->date(),
            'suspended_at' => $this->faker->date()
        ];
    }
}
