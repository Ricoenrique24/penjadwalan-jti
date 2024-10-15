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
        DB::table('data-kelas')->insert([
            [
                'semester' => 1,
                'golongan' => 'A',
                'prodi' => 'Teknik Informatika',
                'total-mhs' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'semester' => 3,
                'golongan' => 'B',
                'prodi' => 'Sistem Informasi',
                'total-mhs' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'semester' => 5,
                'golongan' => 'C',
                'prodi' => 'Manajemen Informatika',
                'total-mhs' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
