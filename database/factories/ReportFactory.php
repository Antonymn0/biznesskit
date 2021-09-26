<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->randomDigit(),
            'employee_id' => $this->faker->randomDigit(),
            'title' => $this->faker->word(),
            'summary' => $this->faker->sentence(),
            'type' => $this->faker->word(),
            'terms' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'suspended_at' => $this->faker->date(),
        ];
    }
}
