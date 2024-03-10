<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomersModel>
 */
class CustomersModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "phone" => fake()->phoneNumber(),
            "email" => fake()->email(),
            "dob" => fake()->date(),
            "doa" => fake()->date(),
        ];
    }
}
