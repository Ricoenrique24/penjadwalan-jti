<?php

namespace Database\Seeders;

use App\Models\JadwalTeknisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalTeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JadwalTeknisi::insert([
            [
                'id_data_teknisi' => 1,
                'id_data_jadwal' => 1,
            ],
            [
                'id_data_teknisi' => 2,
                'id_data_jadwal' => 2,
            ],
            [
                'id_data_teknisi' => 3,
                'id_data_jadwal' => 3,
            ],
        ]);
    }
}
