<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'phone'=> $this->faker->unique()->phoneNumber(),
            'address'=> $this->faker->word() ,
            'password'=>Hash::make('Password.1234'), // password
            'biography'=> $this->faker->sentence,
            'id_number'=> $this->faker->unique()->numberBetween(1,10000),
            'passport_no'=> $this->faker->unique()->numerify('#######') ,
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

            'name' => $this->faker->name(),
            'profile_photo_path'=> 'https://via.placeholder.com/150',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
