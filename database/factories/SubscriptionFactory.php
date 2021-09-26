<?php

namespace Database\Factories;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subscriber_id' => $this->faker->randomDigit(),
            'status' => $this->faker->randomDigit(),
            'payment_type' => $this->faker->RandomElement(['cash', 'Mpesa', 'EFT']),
            'currency' => $this->faker->randomElement(['KES', 'USD', 'EURO', 'Yuan']),
            'total_due' => $this->faker->randomFloat(1),
            'mpesa_phone' => '$this->faker->phoneNumber()',
            'payment_due_date' => $this->faker->date(),
            'interest_rate' => $this->faker->randomFloat(1),
            'account_ref' => $this->faker->word(),
            'transaction_desc' => $this->faker->sentence(),
            'merchant_request_id' => $this->faker->word(),
            'response_code' => $this->faker->word(),
            'response_msg' => $this->faker->word(),
            'card_no' => $this->faker->word(),
            'card_type' => $this->faker->word(),
            'card_month' => $this->faker->word(),
            'comments' => $this->faker->sentence(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'suspended_at' => $this->faker->date(),

        ];
    }
}
