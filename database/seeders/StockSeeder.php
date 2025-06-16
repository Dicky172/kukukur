<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;
use App\Models\Franchise;
use App\Models\Ingredient;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $franchises = Franchise::all();
        $ingredients = Ingredient::all();

        if ($franchises->isEmpty() || $ingredients->isEmpty()) {
            $this->command->info('Tidak ada franchise atau ingredients untuk membuat data stok. Silakan jalankan seeder yang sesuai terlebih dahulu.');
            return;
        }

        foreach ($franchises as $franchise) {
            foreach ($ingredients as $ingredient) {
                Stock::create([
                    'franchise_id' => $franchise->id,
                    'ingredient_id' => $ingredient->id,
                    'quantity' => rand(500, 2000), // Stok awal acak antara 500-2000 (gram/ml)
                ]);
            }
        }
    }
}