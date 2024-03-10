<?php

namespace Database\Seeders;

use App\Models\TableModel;
use Database\Factories\TableModelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $model = TableModel::class;
    public function run(): void
    {
        TableModel::factory()->count(1000)->create();
    }
}
