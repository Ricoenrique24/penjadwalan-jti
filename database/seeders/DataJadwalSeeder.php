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
                'id_matkul' => 1, // ID referensi dari tabel teknisi
                'hari' => 'Senin',
                'id_jam' => 1,
                'semester' => 3,
                'id_ruangan' => 2,
                'tahun_ajaran' => '2024/2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dosen' => 2, // ID referensi dari tabel dosen
                'id_teknisi' => 2, // ID referensi dari tabel teknisi
                'id_matkul' => 2, // ID referensi dari tabel teknisi
                'hari' => 'Senin',
                'id_jam' => 2,
                'semester' => 2,
                'id_ruangan' => 3,
                'tahun_ajaran' => '2024/2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dosen' => 3, // ID referensi dari tabel dosen
                'id_teknisi' => 3, // ID referensi dari tabel teknisi
                'id_matkul' => 3, // ID referensi dari tabel teknisi
                'hari' => 'Senin',
                'id_jam' => 3,
                'semester' => 4,
                'id_ruangan' => 1,
                'tahun_ajaran' => '2024/2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
