<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>  $this->faker->numberBetween(1,1000),
            'work_email' => $this->faker->unique()->safeEmail(),
            'work_phone' =>  $this->faker->word(),
            'sms_notifications' => $this->faker->numberBetween(1,2),
            'email_notifications' => $this->faker->numberBetween(1,2),
            'new_sale_alert' => $this->faker->numberBetween(1,2),
            'new_customer_alert' => $this->faker->numberBetween(1,2),
            'daily_sales_alert' => $this->faker->numberBetween(1,2),
            'customers_report' => $this->faker->numberBetween(1,2),
            'employees_report' => $this->faker->numberBetween(1,2),
            'inventory_report' => $this->faker->numberBetween(1,2),
            'recieve_stock_alert' => $this->faker->numberBetween(1,2),
            'min_stock_alert' => $this->faker->numberBetween(1,2),
            'employement_date' => $this->faker->date(),
            'termination_date' => $this->faker->date(),
            'approved_by' => $this->faker->numberBetween(1,2),
            'registered_by' => $this->faker->numberBetween(1,2),
            'suspended_by' => $this->faker->numberBetween(1,2),
            'suspended_at' => $this->faker->date()
        ];
    }
}
