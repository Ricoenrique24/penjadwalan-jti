<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisMatkul;
use App\Models\KoorMatkul;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DataDosenSeeder::class,
            DataTeknisiSeeder::class,
            DataRuanganSeeder::class,
            DataKelasSeeder::class,
            JenisMatkulSeeder::class,
            DataMatkulSeeder::class,
            DataJamSeeder::class,
            DataJadwalSeeder::class,
            JadwalDosenSeeder::class,
            JadwalTeknisiSeeder::class,
            DataUserSeeder::class,
        ]);
    }
}
