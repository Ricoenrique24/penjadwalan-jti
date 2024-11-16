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
        DB::table('data_jam')->insert([
            [
                'sesi' => 'Sesi 1',
                'jam_awal' => '07:00',
                'jam_akhir' => '08:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => 'Sesi 2',
                'jam_awal' => '08:00',
                'jam_akhir' => '09:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => 'Sesi 3',
                'jam_awal' => '09:00',
                'jam_akhir' => '10:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => 'Sesi 4',
                'jam_awal' => '10:00',
                'jam_akhir' => '11:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => 'Sesi 5',
                'jam_awal' => '11:00',
                'jam_akhir' => '12:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
