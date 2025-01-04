<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            DataMatkulSeeder::class,
            DataJamSeeder::class,
            DataJadwalSeeder::class,
            DataUserSeeder::class,
            KoorMatkulSeeder::class,
        ]);
    }
}
