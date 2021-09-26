<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker-> randomDigit(),
            'cashier_id' => $this->faker-> randomDigit(),
            'reference' => $this->faker-> word(),
            'status' => $this->faker-> word(),
            'type' => $this->faker-> randomElement(['cash', 'mpesa', 'EFT']),
            'amount_due' => $this->faker-> randomFloat(1),
            'discount_rate' => $this->faker-> randomFloat(1),
            'discount_amount' => $this->faker-> randomFloat(1),
            'description' => $this->faker->sentence(),
            'shipping_cost' => $this->faker->randomFloat(1),
            'suspended_at' => $this->faker-> date()
        ];
    }
}
