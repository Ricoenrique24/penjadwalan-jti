<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_matkul')->insert([
            [
                'kd_matkul' => Str::random(5),
                'nama_matkul' => 'Pemrograman Web',
                'jumlah_sks' => 3,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_matkul' => Str::random(5),
                'nama_matkul' => 'Sistem Operasi',
                'jumlah_sks' => 4,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_matkul' => Str::random(5),
                'nama_matkul' => 'Jaringan Komputer',
                'jumlah_sks' => 3,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
