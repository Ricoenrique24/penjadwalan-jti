<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_ruangan')->insert([
            [
                'kd_ruangan' => Str::random(5),
                'nama_ruangan' => 'Ruang Serbaguna',
                'kapasitas' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_ruangan' => Str::random(5),
                'nama_ruangan' => 'Ruang Kelas 1',
                'kapasitas' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd_ruangan' => Str::random(5),
                'nama_ruangan' => 'Ruang Kelas 2',
                'kapasitas' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
