<?php

namespace Database\Seeders;

use App\Models\KoorMatkul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KoorMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KoorMatkul::create([
            'id_matkul' => 1,
            'id_dosen' => 1
        ]);
        KoorMatkul::create([
            'id_matkul' => 1,
            'id_dosen' => 2
        ]);
        KoorMatkul::create([
            'id_matkul' => 2,
            'id_dosen' => 2
        ]);
        KoorMatkul::create([
            'id_matkul' => 3,
            'id_dosen' => 3
        ]);
    }
}
