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
        DB::table('data-ruangan')->insert([
            [
                'kd-ruangan' => Str::random(5),
                'nama-ruangan' => 'Ruang Serbaguna',
                'kapasitas' => 50,
                'status' => true, // true untuk aktif, false untuk tidak aktif
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd-ruangan' => Str::random(5),
                'nama-ruangan' => 'Ruang Kelas 1',
                'kapasitas' => 30,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kd-ruangan' => Str::random(5),
                'nama-ruangan' => 'Ruang Kelas 2',
                'kapasitas' => 25,
                'status' => false, // false untuk ruangan yang sedang tidak digunakan
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
