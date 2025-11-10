<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'user_id' => User::factory(),
            'brand'=> $this->faker->randomElement(['Toyota','Honda', 'Ford', 'BMW', 'Tesla']),
            'model'=> $this->faker->word(),
            'year'=>$this->faker->numberBetween(2000,2025),
            'price'=>$this->faker->randomFloat(2, 5000,50000),
        ];
    }
}
