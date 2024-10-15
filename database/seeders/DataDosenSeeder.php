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
        DB::table('data-dosen')->insert([
            [
                'kd-dosen' => Str::random(5),
                'nip' => '197001012021012001',
                'nama-dosen' => 'Dr. Budi Santoso',
                'jenis-kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd-dosen' => Str::random(5),
                'nip' => '198002022022022002',
                'nama-dosen' => 'Prof. Siti Aminah',
                'jenis-kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd-dosen' => Str::random(5),
                'nip' => '198503032023033003',
                'nama-dosen' => 'Ahmad Fauzi, M.Sc',
                'jenis-kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
