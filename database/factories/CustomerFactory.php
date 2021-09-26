<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotZero(),
            'loyalty_points' => $this->faker->randomDigitNotZero(),
            'sms_notification' => $this->faker->randomDigitNotZero(),
            'newsletter_subscription' => $this->faker->randomDigitNotZero(),
            'payment_mode' => $this->faker->randomDigitNotZero(),
            'mpesa_no' => $this->faker->numerify('#########'),
            'card_no' => $this->faker->word(),
            'card_type' => $this->faker->word(),
            'card_month' => $this->faker->word(),
            'card_year' => $this->faker->word(),
            'card_csv' => $this->faker->word(),
            'approved_by' => $this->faker->randomDigitNotZero(),
            'relationship_mngr_id' => $this->faker->randomDigitNotZero(),
            'registered_by' => $this->faker->randomDigitNotZero(),
            'suspended_by' => $this->faker->randomDigitNotZero()
        ];
    }
}
