<?php

namespace Database\Seeders;

use App\Models\JenisMatkul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisMatkul::insert([
            ['nama' => 'Teori'],
            ['nama' => 'Praktikum'],
            ['nama' => 'Teori & Praktikum'],
        ]);
    }
}
