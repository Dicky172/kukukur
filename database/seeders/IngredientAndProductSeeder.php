<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Product;

class IngredientAndProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Bahan Baku (Ingredients) ---
        $mie = Ingredient::create(['name' => 'Mie Telur', 'unit' => 'gram']);
        $ayam = Ingredient::create(['name' => 'Daging Ayam Cincang', 'unit' => 'gram']);
        $sawi = Ingredient::create(['name' => 'Sawi Hijau', 'unit' => 'gram']);
        $bawang = Ingredient::create(['name' => 'Bawang Goreng', 'unit' => 'gram']);
        $bakso = Ingredient::create(['name' => 'Bakso Sapi', 'unit' => 'gram']);
        $kecap = Ingredient::create(['name' => 'Kecap Manis', 'unit' => 'ml']);
        $saos = Ingredient::create(['name' => 'Saus Sambal', 'unit' => 'ml']);

        // --- Produk (Products) ---
        
        // Produk 1: Mie Ayam Original
        $mieAyamOriginal = Product::create([
            'name' => 'Mie Ayam Original',
            'description' => 'Mie ayam klasik dengan topping ayam cincang spesial.',
            'price' => 15000,
            // 'image' => 'images/mie-ayam-original.jpg', // sesuaikan path jika perlu
        ]);

        // Menautkan bahan baku ke produk
        $mieAyamOriginal->ingredients()->attach([
            $mie->id => ['quantity' => 100],
            $ayam->id => ['quantity' => 50],
            $sawi->id => ['quantity' => 20],
            $bawang->id => ['quantity' => 5],
        ]);

        // Produk 2: Mie Ayam Bakso
        $mieAyamBakso = Product::create([
            'name' => 'Mie Ayam Bakso',
            'description' => 'Mie ayam original ditambah dengan bakso sapi kenyal.',
            'price' => 20000,
            // 'image' => 'images/mie-ayam-bakso.jpg', // sesuaikan path jika perlu
        ]);

        // Menautkan bahan baku ke produk
        $mieAyamBakso->ingredients()->attach([
            $mie->id => ['quantity' => 100],
            $ayam->id => ['quantity' => 40],
            $sawi->id => ['quantity' => 20],
            $bawang->id => ['quantity' => 5],
            $bakso->id => ['quantity' => 30], // Misal 3 buah bakso @ 10 gram
        ]);
        
        // Produk 3: Mie Yamin Manis
        $mieYamin = Product::create([
            'name' => 'Mie Yamin Manis',
            'description' => 'Mie ayam dengan bumbu kecap manis yang legit.',
            'price' => 16000,
            // 'image' => 'images/mie-yamin.jpg', // sesuaikan path jika perlu
        ]);

         // Menautkan bahan baku ke produk
         $mieYamin->ingredients()->attach([
            $mie->id => ['quantity' => 100],
            $ayam->id => ['quantity' => 40],
            $sawi->id => ['quantity' => 20],
            $kecap->id => ['quantity' => 15],
        ]);
    }
}