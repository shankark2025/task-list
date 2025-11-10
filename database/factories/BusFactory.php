<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
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
            'bus_id' => (string) Str::uuid(),
            'brand'=> $this->faker->randomElement(['Toyota','Honda', 'Ford', 'BMW', 'Tesla']),
            'model'=> $this->faker->word(),
            'year'=>$this->faker->numberBetween(2000,2025),
            'price'=>$this->faker->randomFloat(2, 5000,50000),
        ];
    }
}
