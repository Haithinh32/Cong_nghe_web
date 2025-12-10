<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('computers')->insert([
            [
                'computer_name' => 'Lab1-PC05',
                'model' => 'Dell Optiplex 7090',
                'operating_system' => 'Windows 10 Pro',
                'processor' => 'Intel Core i5-11400',
                'memory' => 16,
                'available' => true,
            ],
            [
                'computer_name' => 'Lab2-PC10',
                'model' => 'HP EliteDesk 800',
                'operating_system' => 'Windows 11 Pro',
                'processor' => 'Intel Core i7-11700',
                'memory' => 32,
                'available' => false,
            ],
        ]);
    }
}
