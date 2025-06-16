<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Franchise;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $franchises = Franchise::all();

        foreach ($franchises as $franchise) {
            // Membuat Manajer untuk setiap cabang
            User::create([
                'name' => 'Manager ' . $franchise->name,
                'email' => 'manager' . str_replace(' ', '', strtolower($franchise->name)) . '@kukurukuy.com',
                'password' => Hash::make('password123'),
                'role' => 'manager',
                'franchise_id' => $franchise->id,
                'email_verified_at' => now(),
            ]);

            // Membuat Kasir untuk setiap cabang
            User::create([
                'name' => 'Kasir ' . $franchise->name,
                'email' => 'kasir' . str_replace(' ', '', strtolower($franchise->name)) . '@kukurukuy.com',
                'password' => Hash::make('password123'),
                'role' => 'cashier',
                'franchise_id' => $franchise->id,
                'email_verified_at' => now(),
            ]);
        }
    }
}