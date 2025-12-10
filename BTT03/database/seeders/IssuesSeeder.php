<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
class IssuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        DB::table('issues')->insert([
            [
                'computer_id' => 1,
                'reported_by' => 'John Doe',
                'reported_date' => now(),
                'description' => 'The computer is not booting properly.',
                'urgency' => 'High',
                'status' => 'Open',
            ],
            [
                'computer_id' => 2,
                'reported_by' => 'Jane Smith',
                'reported_date' => now(),
                'description' => 'The operating system is crashing frequently.',
                'urgency' => 'Medium',
                'status' => 'In Progress',
            ],
        ]);
    }
}
