<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_dosen')->insert([
            [
                'kd_dosen' => Str::random(5),
                'nip' => '197001012021012001',
                'nama_dosen' => 'Dr. Budi Santoso',
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_dosen' => Str::random(5),
                'nip' => '198002022022022002',
                'nama_dosen' => 'Prof. Siti Aminah',
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_dosen' => Str::random(5),
                'nip' => '198503032023033003',
                'nama_dosen' => 'Ahmad Fauzi, M.Sc',
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
