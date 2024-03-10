<?php

namespace Database\Factories;

use App\Models\TableModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TableModel>
 */
class TableModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TableModel::class;
    public function definition(): array
    {
        return [
            'table_no' => $this->faker->numerify(),
            'capacity' => $this->faker->numerify(),
        ];
    }
}
