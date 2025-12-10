<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '2018-05-10',
                'parent_phone' => '0123456789',
                'class_id' => 1,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'date_of_birth' => '2017-08-15',
                'parent_phone' => '0987654321',
                'class_id' => 2,
            ],
        ]);
    }
}
