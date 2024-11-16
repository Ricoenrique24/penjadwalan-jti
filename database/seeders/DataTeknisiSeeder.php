<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataTeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_teknisi')->insert([
            [
                'nik' => Str::random(10),
                'nama_teknisi' => 'Joko Prasetyo',
                'jabatan' => 'Teknisi Jaringan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => Str::random(10),
                'nama_teknisi' => 'Rina Setiawan',
                'jabatan' => 'Teknisi Listrik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => Str::random(10),
                'nama_teknisi' => 'Dedi Kurniawan',
                'jabatan' => 'Teknisi Perangkat Keras',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
