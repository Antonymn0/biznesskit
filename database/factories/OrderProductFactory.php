<?php

namespace Database\Factories;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->randomDigit(),
            'product_id' => $this->faker->randomDigit(),
            'name' => $this->faker->word(),
            'unit_price' => $this->faker->randomFloat(1),
            'total_amount' => $this->faker->randomFloat(1),
            'payable_amount' => $this->faker->randomFloat(1),
            'vat_amount' => $this->faker->randomFloat(1),
            'quantity' => $this->faker->randomDigit(1),
            'suspended_at' => $this->faker->date(),
        ];
    }
}
