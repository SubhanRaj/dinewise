<?php

namespace Database\Seeders;

use App\Models\CustomersModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomersModel::factory()->count(1000)->create();
    }
}
