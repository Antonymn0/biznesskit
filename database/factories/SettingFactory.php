<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->randomDigit(),
            'status' => $this->faker->randomDigit(),
            'category' => $this->faker->word(),
            'meta_name' => $this->faker->word(),
            'meta_val' => $this->faker->word(),
            'suspended_at' => $this->faker->date(),
        ];
    }
}
