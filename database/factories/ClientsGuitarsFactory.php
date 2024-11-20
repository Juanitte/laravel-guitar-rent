<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientsGuitars>
 */
class ClientsGuitarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'return_date' => fake()->dateTime(),
            'client_id' => fake()->numberBetween(1, 5),
            'guitar_id' => fake()->numberBetween(1, 3)
        ];
    }
}
