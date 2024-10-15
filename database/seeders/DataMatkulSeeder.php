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
        DB::table('data-matkul')->insert([
            [
                'kd-matkul' => Str::random(5),
                'nama-matkul' => 'Pemrograman Web',
                'jumlah-sks' => 3,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd-matkul' => Str::random(5),
                'nama-matkul' => 'Sistem Operasi',
                'jumlah-sks' => 4,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd-matkul' => Str::random(5),
                'nama-matkul' => 'Jaringan Komputer',
                'jumlah-sks' => 3,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
