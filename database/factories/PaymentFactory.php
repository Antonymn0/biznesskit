<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->randomDigit(),
            'method' => $this->faker->word(),
            'status' => $this->faker->randomDigit(),
            'currency' => $this->faker->word(),
            'total_due' => $this->faker->randomFloat(1),
            'payment_due_date' => $this->faker->date(),
            'interest_rate' => $this->faker->randomFloat(1),
            'account_ref' => $this->faker->word(),
            'transaction_desc' => $this->faker->sentence(),
            'merchant_request_id' => $this->faker->word(),
            'checkout_request_id' => $this->faker->word(),
            'response_code' => $this->faker->word(),
            'response_msg' => $this->faker->sentence(),
            'cheque_no' => $this->faker->word(),
            'cheque_bank_name' => $this->faker->word(),
            'cheque_bank_branch' => $this->faker->word(),
            'card_no' => $this->faker->word(),
            'card_type' => $this->faker->word(),
            'card_month' => $this->faker->word(),
            'card_year' => $this->faker->word(),
            'card_csv' => $this->faker->word(),
            'comments' => $this->faker->word(),
            'suspended_at' => $this->faker->date()
        ];
    }
}
