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
        DB::table('data_jadwal')->insert([
            [
                'id_dosen' => 1, // ID referensi dari tabel dosen
                'id_teknisi' => 1, // ID referensi dari tabel teknisi
                'hari' => 'Senin',
                'jam' => '07.00 - 08.00',
                'matkul' => 'Pemrograman Web',
                'semester' => 3,
                'ruangan' => 'Ruang Kelas 1',
                'dosen' => 'Dr. Budi Santoso',
                'teknisi' => 'Joko Prasetyo',
                'tahun_ajaran' => '2024/2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dosen' => 2, // ID referensi dari tabel dosen
                'id_teknisi' => 2, // ID referensi dari tabel teknisi
                'hari' => 'Senin',
                'jam' => '08.00 - 09.00',
                'matkul' => 'Sistem Operasi',
                'semester' => 2,
                'ruangan' => 'Ruang Kelas 2',
                'dosen' => 'Prof. Siti Aminah',
                'teknisi' => 'Rina Setiawan',
                'tahun_ajaran' => '2024/2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dosen' => 3, // ID referensi dari tabel dosen
                'id_teknisi' => 3, // ID referensi dari tabel teknisi
                'hari' => 'Senin',
                'jam' => '09.00 - 10.00',
                'matkul' => 'Jaringan Komputer',
                'semester' => 4,
                'ruangan' => 'Ruang Serbaguna',
                'dosen' => 'Ahmad Fauzi, M.Sc',
                'teknisi' => 'Dedi Kurniawan',
                'tahun_ajaran' => '2024/2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
