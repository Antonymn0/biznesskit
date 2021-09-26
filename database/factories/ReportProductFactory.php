<?php

namespace Database\Factories;

use App\Models\ReportProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReportProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'report_id' => $this->faker->randomDigit(),
            'product_id' => $this->faker->randomDigit(),
            'name' => $this->faker->word(),
            'payable_amount' => $this->faker->randomFloat(1),
            'vat_amount' => $this->faker->randomFloat(1),
            'quantity' => $this->faker->randomDigit(),
            'suspended_at' => $this->faker->date()
        ];
    }
}
