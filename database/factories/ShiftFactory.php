<?php

namespace Database\Factories;

use App\Models\Shift;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->randomDigit(),
            'approved_by' => $this->faker->randomDigit(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'type' => $this->faker->word(),
            'rate_per_hour' => $this->faker->randomFloat(1),
            'total_hours' => $this->faker->randomFloat(1),
            'description' => $this->faker->sentence(),
            'suspended_at' => $this->faker->date()
        ];
    }
}
