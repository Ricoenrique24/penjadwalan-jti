<?php

namespace Database\Seeders;

use App\Http\Controllers\dosen\JadwalDosen;
use App\Models\Jadwal;
use App\Models\JadwalDosen as ModelsJadwalDosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsJadwalDosen::insert([
            [
                'id_data_dosen' => 1,
                'id_data_jadwal' => 1,
            ],
            [
                'id_data_dosen' => 18,
                'id_data_jadwal' => 1,
            ],
            [
                'id_data_dosen' => 9,
                'id_data_jadwal' => 2,
            ],
            [
                'id_data_dosen' => 33,
                'id_data_jadwal' => 2,
            ],
            [
                'id_data_dosen' => 8,
                'id_data_jadwal' => 3,
            ],
            [
                'id_data_dosen' => 52,
                'id_data_jadwal' => 3,
            ],
        ]);
    }
}
