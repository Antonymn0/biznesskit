<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wallet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subscriber_id' => $this->faker->randomDigit(),
            'available_bal' => $this->faker->randomFloat(1),
            'currency' => $this->faker->randomElement(['Ksh', 'USD', 'euro']),
            'status' => $this->faker->randomDigit(1,5),
        ];
    }
}
