<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_kelas')->insert([
            [
                'semester' => 1,
                'golongan' => 'A',
                'prodi' => 'Teknik Informatika',
                'total_mhs' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'semester' => 3,
                'golongan' => 'B',
                'prodi' => 'Sistem Informasi',
                'total_mhs' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'semester' => 5,
                'golongan' => 'C',
                'prodi' => 'Manajemen Informatika',
                'total_mhs' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
