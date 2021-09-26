<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotZero(),
            'access_code' => $this->faker->randomDigitNotZero(),
            'work_email' => $this->faker->safeEmail(),
            'work_phone' => $this->faker->phoneNumber(),
            'mpesa_no' => $this->faker->phoneNumber(),
            'bank' => $this->faker->randomElement(['Equity', 'KCb', 'Coop', 'CBA']),
            'bank_branch' => $this->faker->word(),
            'bank_code' => $this->faker->word(),
            'bank_acc_no' => $this->faker->word(),
            'payment_mode' => $this->faker->word(),
            'basic_salary' => $this->faker->randomFloat(1),
            'house_allowance' => $this->faker->randomFloat(1),
            'transport_allowance' => $this->faker->randomFloat(1),
            'other_allowances' => $this->faker->randomFloat(1),
            'overtime_amount' => $this->faker->randomFloat(1),
            'paye_amount' => $this->faker->randomFloat(1),
            'helb_amount' => $this->faker->randomFloat(1),
            'loan_amount' => $this->faker->randomFloat(1),
            'nhif_amount' => $this->faker->randomFloat(1),
            'nssf_amount' => $this->faker->randomFloat(1),
            'net_pay' => $this->faker->randomFloat(1),
            'height' => $this->faker->randomFloat(1),
            'status' => $this->faker->randomDigitNotZero(),
            'kra_pin' => $this->faker->word(),
            'kra_pin' => $this->faker->word(),
            'nhif_no' => $this->faker->word(),
            'nssf_no' => $this->faker->word(),
            'job_id' => $this->faker->word(),
            'employement_date' => $this->faker->date(),
            'termination_date' => $this->faker->date(),
            'approved_by' => $this->faker->randomDigitNotZero(),
            'supervisor_id' => $this->faker->randomDigitNotZero(),
            'registered_by' => $this->faker->randomDigitNotZero(),
            'suspended_at' => $this->faker->date(),
            'suspended_by' => $this->faker->randomDigitNotZero(),
        ];
    }
}
