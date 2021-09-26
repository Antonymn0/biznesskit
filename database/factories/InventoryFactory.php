<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomDigit(),
            'created_by' => $this->faker->randomDigit(),
            'new_quantity' => $this->faker->randomDigit(),
            'available_quantity' => $this->faker->randomDigit(),
            'units' => $this->faker->randomDigit(),
            'reason' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'suspended_at' => $this->faker->date()
        ];
    }
}
