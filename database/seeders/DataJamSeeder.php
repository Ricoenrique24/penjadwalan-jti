<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataJamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data-jam')->insert([
            [
                'sesi' => 'Sesi 1',
                'jam' => '07.00 - 08.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => 'Sesi 2',
                'jam' => '08.00 - 09.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => 'Sesi 3',
                'jam' => '09.00 - 10.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => 'Sesi 4',
                'jam' => '10.00 - 11.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => 'Sesi 5',
                'jam' => '11.00 - 12.00',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
