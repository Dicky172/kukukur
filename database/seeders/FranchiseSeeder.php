<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Franchise;

class FranchiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Franchise::create([
            'name' => 'KukuruKuy Pusat',
            'address' => 'Jalan Jenderal Sudirman No. 1, Jakarta',
            'phone_number' => '0838526633'
        ]);
        
        Franchise::create([
            'name' => 'KukuruKuy Cabang Melati',
            'address' => 'Jalan Melati No. 12, Surabaya',
            'phone_number' => '08385263577'
            
        ]);
        
        Franchise::create([
            'name' => 'KukuruKuy Cabang Mawar',
            'address' => 'Jalan Mawar No. 34, Bandung',
            'phone_number' => '08385265436'
        ]);
    }
}