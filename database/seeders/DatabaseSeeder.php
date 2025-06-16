<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class, // Seeder bawaan untuk user admin
            FranchiseSeeder::class, // Buat cabang dulu
            IngredientAndProductSeeder::class, // Lalu buat bahan dan produk
            UserRoleSeeder::class, // Buat user (manajer & kasir) yang bergantung pada cabang
            StockSeeder::class, // Terakhir, buat stok yang bergantung pada cabang dan bahan baku
        ]);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
