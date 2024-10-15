<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data-jadwal')->insert([
            [
                'hari' => 'Senin',
                'jam' => '07.00 - 08.00',
                'matkul' => 'Pemrograman Web',
                'semester' => 3,
                'ruangan' => 'Ruang Kelas 1',
                'dosen' => 'Dr. Budi Santoso',
                'teknisi' => 'Joko Prasetyo',
                'kelas' => 'Sesi 1 - Teknik Informatika A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hari' => 'Senin',
                'jam' => '08.00 - 09.00',
                'matkul' => 'Sistem Operasi',
                'semester' => 2,
                'ruangan' => 'Ruang Kelas 2',
                'dosen' => 'Prof. Siti Aminah',
                'teknisi' => 'Rina Setiawan',
                'kelas' => 'Sesi 2 - Sistem Informasi B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hari' => 'Senin',
                'jam' => '09.00 - 10.00',
                'matkul' => 'Jaringan Komputer',
                'semester' => 4,
                'ruangan' => 'Ruang Serbaguna',
                'dosen' => 'Ahmad Fauzi, M.Sc',
                'teknisi' => 'Dedi Kurniawan',
                'kelas' => 'Sesi 3 - Manajemen Informatika C',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
