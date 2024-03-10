<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductModel>
 */
class ProductModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'auto_product_id' => fake()->numerify(),
            'product_id' => fake()->numerify(),
            'cat_id' => fake()->numerify(),
            'product_name' => fake()->name(),
            'product_image' => fake()->imageUrl(),
            'stock' => fake()->numerify(),
            'price' => fake()->numerify()
        ];
    }
}
