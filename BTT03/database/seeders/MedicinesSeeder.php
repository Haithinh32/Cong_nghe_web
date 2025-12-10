<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('medicines')->insert([
            [
                'name' => 'Paracetamol',
                'brand' => 'Brand A',
                'dosage' => '500mg',
                'form' => 'Tablet',
                'price' => 5000,
                'stock' => 100,
            ],
            [
                'name' => 'Ibuprofen',
                'brand' => 'Brand B',
                'dosage' => '200mg',
                'form' => 'Capsule',
                'price' => 8000,
                'stock' => 50,
            ],
        ]);
    }
}
