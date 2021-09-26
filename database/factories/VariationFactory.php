<?php

namespace Database\Factories;

use App\Models\Variation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Variation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomDigit(),
            'meta' => $this->faker->word(),
            'meta_val' => $this->faker->word(),
            'units' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'suspended_at' => $this->faker->date(),
        ];
    }
}
