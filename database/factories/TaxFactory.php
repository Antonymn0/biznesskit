<?php

namespace Database\Factories;

use App\Models\Tax;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tax::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'initials' => $this->faker->word(),
            'type' => $this->faker->word(),
            'rate' => $this->faker->randomFloat(1),
            'amount' => $this->faker->randomFloat(1),
            'description' => $this->faker->sentence(),
            'suspended_at' => $this->faker->date(),
        ];
    }
}
