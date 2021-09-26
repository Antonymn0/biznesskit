<?php

namespace Database\Factories;

use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscriber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name'=> $this->faker-> sentence(),
            'first_name'=> $this->faker-> firstName(),
            'middle_name'=> $this->faker-> firstName(),
            'last_name'=> $this->faker-> lastName(),
            'user_name'=> $this->faker->unique()->userName(),
            'email'=> $this->faker->unique()->safeEmail(),
            'phone'=> $this->faker->phoneNumber(),
            'address'=> $this->faker->word() ,
            'password'=>'Password.1234', // password
            'biography'=> $this->faker->sentence,
            'id_number'=> $this->faker->unique()->randomNumber(),
            'passport_no'=> $this->faker->unique()->numerify('##-##-###') ,
            'dob'=> $this->faker->date(),
            'city'=> $this->faker->city() ,
            'postal_code'=> $this->faker->postcode(),
            'physical_address'=> $this->faker->word() ,
            'phone_verified_at'=> $this->faker->date(),
            'email_verified_at'=> $this->faker->date(),
            'id_verified_at'=> $this->faker->date() ,
            'gender'=> $this->faker->numberBetween( 1, 2),
            'marital_status'=> $this->faker->numberBetween( 1, 2),
            'nationality'=> $this->faker->country(),
            'suspended_at'=> $this->faker-> date() ,

            
        ];
    }
}
