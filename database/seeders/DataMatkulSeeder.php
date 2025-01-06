<?php

namespace Database\Seeders;

use App\Models\Matkul;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DataMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // // Mengambil data dari API eksternal
        // $response = Http::get('http://localhost:8001/api/matkul'); // Ganti dengan URL API Anda

        // // Memastikan jika request berhasil
        // if ($response->successful()) {
        //     $matkulData = $response->json(); // Asumsi data berada di dalam key 'data'

        //     // Menyimpan data matkul ke dalam tabel 'data_matkul'
        //     $matkul = array_map(function ($matkul) {
        //         return [
        //             'kd_matkul' => $matkul['kd_matkul'],
        //             'nama_matkul' => $matkul['nama_matkul'],
        //             'jumlah_sks' => $matkul['jumlah_sks'],
        //             'semester' => $matkul['semester'],
        //             'jenis_matkul' => $matkul['jenis_matkul'],
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ];
        //     }, $matkulData);

        //     DB::table('data_matkul')->upsert($matkul, ['kd_matkul']);
        // } else {
        //     // Jika request gagal, tampilkan pesan kesalahan
        //     echo "Gagal mengambil data dari API.";
        // }


        $json = '[{"kd_matkul":"TIF1207078","nama_matkul":"Workshop Sistem Informasi Berbasis Desktop","jumlah_sks":4,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF120704","nama_matkul":"Interaksi Manusia dan Komputer","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"TIF120705","nama_matkul":"Sistem Aplikasi Berbasis Obyek","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"TIF120706","nama_matkul":"Perencanaan Proyek Perangkat Lunak","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"TIF120708","nama_matkul":"Workshop Manajemen Proyek","jumlah_sks":4,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF120701","nama_matkul":"Bahasa Indonesia","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"TIF120702","nama_matkul":"Kewarganegaraan","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"TIF120703","nama_matkul":"Intermediate English","jumlah_sks":2,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF130706","nama_matkul":"Literasi Digital","jumlah_sks":2,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF140702","nama_matkul":"Kewirausahaan","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TIF140703","nama_matkul":"Manajemen Kualitas Perangkat Lunak","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TIF140704","nama_matkul":"Perawatan Perangkat Lunak","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TIF140705","nama_matkul":"Pengujian Perangkat Lunak","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TIF140706","nama_matkul":"Workshop Sistem Informasi Web Framework","jumlah_sks":4,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF140707","nama_matkul":"Workshop Mobile Applications Framework","jumlah_sks":4,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF160701","nama_matkul":"Teknik Penulisan Ilmiah","jumlah_sks":2,"semester":6,"jenis_matkul":"Teori"},{"kd_matkul":"TIF160703","nama_matkul":"Trend Teknologi","jumlah_sks":2,"semester":6,"jenis_matkul":"Teori"},{"kd_matkul":"TIF160704","nama_matkul":"Data Warehouse","jumlah_sks":2,"semester":6,"jenis_matkul":"Teori"},{"kd_matkul":"TIF160705","nama_matkul":"Workshop Developer Operasi","jumlah_sks":4,"semester":6,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF160706","nama_matkul":"Workshop Tata Kelola Teknologi Informasi","jumlah_sks":4,"semester":6,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF160707","nama_matkul":"Workshop Proyek Sistem Informasi","jumlah_sks":4,"semester":6,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF180701","nama_matkul":"Skripsi","jumlah_sks":6,"semester":8,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK20701","nama_matkul":"Bahasa Indonesia","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"MIF140703","nama_matkul":"Pemrograman Mobile","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TKK20702","nama_matkul":"Kewarganegaraan","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"TKK20703","nama_matkul":"Intermediate English","jumlah_sks":2,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK20704","nama_matkul":"SISTEM KONTROL ELEKTRONIK","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"TKK20705","nama_matkul":"JARINGAN KOMPUTER","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"TKK20706","nama_matkul":"WORKSHOP INFRASTRUKTUR JARINGAN KOMPUTER","jumlah_sks":4,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK20707","nama_matkul":"WORKSHOP PEMROGRAMAN WEB","jumlah_sks":2,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK20708","nama_matkul":"WORKSHOP ELEKTRONIKA TERAPAN","jumlah_sks":4,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK40701","nama_matkul":"Teknik Penulisan Ilmiah","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TKK40702","nama_matkul":"INTERPERSONAL SKILL","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TKK40703","nama_matkul":"KOMPUTASI AWAN","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TKK40704","nama_matkul":"JARINGAN BERBASIS SOFTWARE","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TKK40705","nama_matkul":"SISTEM OTOMASI","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TKK40706","nama_matkul":"INTERNET OF THINGS","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"TKK40707","nama_matkul":"WORKSHOP KOMPUTASI AWAN","jumlah_sks":4,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK40708","nama_matkul":"WORKSHOP SISTEM KOMPUTER KONTROL","jumlah_sks":4,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK60701","nama_matkul":"KEWIRAUSAHAAN","jumlah_sks":2,"semester":6,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK60702","nama_matkul":"TUGAS AKHIR","jumlah_sks":6,"semester":6,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF120701","nama_matkul":"Bahasa Indonesia","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"MIF120702","nama_matkul":"Kewarganegaraan","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"MIF120703","nama_matkul":"Intermediate English","jumlah_sks":2,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF120704","nama_matkul":"Pemrograman Berorientasi Objek","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"MIF120705","nama_matkul":"Design Web","jumlah_sks":2,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF120706","nama_matkul":"Analisis dan Desain Sistem Informasi","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"MIF120707","nama_matkul":"Workshop Pengembangan Aplikasi","jumlah_sks":4,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF120708","nama_matkul":"Workshop Manajemen Basis data","jumlah_sks":4,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF140701","nama_matkul":"Teknik Penulisan","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"MIF140702","nama_matkul":"Data Mining","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"MIF140704","nama_matkul":"Interpersonal Skill","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"MIF140705","nama_matkul":"Argoinformatika","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"MIF140706","nama_matkul":"Customer Relationship Management","jumlah_sks":2,"semester":4,"jenis_matkul":"Tidak Diketahui"},{"kd_matkul":"MI1F40707","nama_matkul":"Workshop Progressive Web Apps","jumlah_sks":4,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF140708","nama_matkul":"Workshop Basisdata Lanjut","jumlah_sks":4,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF160701","nama_matkul":"Bisnis Jasa Informatika","jumlah_sks":2,"semester":6,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF160702","nama_matkul":"Manajemen Proyek Sistem Informasi","jumlah_sks":2,"semester":6,"jenis_matkul":"Teori"},{"kd_matkul":"MIF160703","nama_matkul":"Tugas Akhir","jumlah_sks":6,"semester":6,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK10701","nama_matkul":"AGAMA","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TKK10702","nama_matkul":"PANCASILA","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TKK10703","nama_matkul":"BASIC ENGLISH","jumlah_sks":2,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK10706","nama_matkul":"SISTEM OPERASI","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TKK10705","nama_matkul":"LOGIKA DAN ALGORITMA PEMROGRAMAN","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TKK10704","nama_matkul":"LITERASI DIGITAL","jumlah_sks":2,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK10707","nama_matkul":"WORKSHOP ADMINISTRASI SISTEM","jumlah_sks":4,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK10708","nama_matkul":"WORKSHOP PEMROGRAMAN DASAR","jumlah_sks":4,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK3601","nama_matkul":"SISTEM PERTANIAN DIGITAL","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"TKK3602","nama_matkul":"MANAJEMEN BASIS DATA","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"TKK3603","nama_matkul":"ROUTING DAN SWITCHING","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"TKK3604","nama_matkul":"KEAMANAN JARINGAN","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"TKK3605","nama_matkul":"MIKROKOMPUTER","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"TKK3606","nama_matkul":"WORKSHOP SISTEM TERTANAM","jumlah_sks":3,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK3607","nama_matkul":"WORKSHOP JARINGAN WAN","jumlah_sks":4,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK3608","nama_matkul":"WORKSHOP APLIKASI MOBILE","jumlah_sks":3,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"TKK5601","nama_matkul":"PRAKTEK KERJA LAPANG","jumlah_sks":20,"semester":7,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF110701","nama_matkul":"Agama","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"MIF110702","nama_matkul":"Pancasila","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"MIF110703","nama_matkul":"Basic English","jumlah_sks":2,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF110704","nama_matkul":"Algoritma Pemrograman","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"MIF110705","nama_matkul":"Dasar Manajemen","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"MIF110706","nama_matkul":"Basisdata","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"MIF110707","nama_matkul":"Statistika Terapan","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"MIF110708","nama_matkul":"Workshop Basis Data Relational","jumlah_sks":2,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF110709","nama_matkul":"Workshop Pemrograman Dasar","jumlah_sks":4,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF130701","nama_matkul":"Kewirausahaan","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"MIF130702","nama_matkul":"Sistem Informasi Geografis","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"MIF130703","nama_matkul":"Manajemen Operasional","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"MIF130704","nama_matkul":"Kecerdasan Bisnis Terapan","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"MIF130705","nama_matkul":"Komunikasi Visual","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"MIF130707","nama_matkul":"Workshop Sistem Informasi","jumlah_sks":4,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF130708","nama_matkul":"Workshop Visualisasi Data","jumlah_sks":4,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF150701","nama_matkul":"Praktek Kerja Lapang","jumlah_sks":20,"semester":5,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF10701","nama_matkul":"Agama","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TIF10702","nama_matkul":"Pancasila","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TIF10703","nama_matkul":"Basic English","jumlah_sks":2,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF10704","nama_matkul":"Logika dan Algoritma","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TIF10705","nama_matkul":"Konsep Basis Data","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TIF10706","nama_matkul":"Pemrograman Dasar","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TIF10707","nama_matkul":"Workshop Pengembangan Perangkat Lunak","jumlah_sks":4,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF10708","nama_matkul":"Workshop Basis Data","jumlah_sks":4,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF130702","nama_matkul":"Matematika Diskrit","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"TIF130703","nama_matkul":"Konsep Jaringan Komputer","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"TIF30704","nama_matkul":"Struktur Data","jumlah_sks":2,"semester":3,"jenis_matkul":"Teori"},{"kd_matkul":"TIF30705","nama_matkul":"Workshop Kualitas Perangkat Lunak","jumlah_sks":4,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF30706","nama_matkul":"Workshop Sistem Informasi Berbasis Web","jumlah_sks":4,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF30707","nama_matkul":"Workshop Mobile Applications","jumlah_sks":4,"semester":3,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF50701","nama_matkul":"Aplikasi Sistem Tertanam","jumlah_sks":2,"semester":5,"jenis_matkul":"Teori"},{"kd_matkul":"TIF50702","nama_matkul":"Sistem Cerdas","jumlah_sks":2,"semester":5,"jenis_matkul":"Teori"},{"kd_matkul":"TIF50703","nama_matkul":"Agroinformatika","jumlah_sks":2,"semester":5,"jenis_matkul":"Teori"},{"kd_matkul":"TIF50704","nama_matkul":"Multimedia Permainan","jumlah_sks":2,"semester":5,"jenis_matkul":"Teori"},{"kd_matkul":"TIF50705","nama_matkul":"Workshop Pengolahan Citra dan Vision","jumlah_sks":4,"semester":5,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF50706","nama_matkul":"Workshop Sistem Tertanam","jumlah_sks":4,"semester":5,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF50707","nama_matkul":"Workshop Sistem Cerdas","jumlah_sks":4,"semester":5,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF70701","nama_matkul":"Magang","jumlah_sks":20,"semester":7,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF150704","nama_matkul":"Multimedia Permainan","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TIF160701","nama_matkul":"Teknik Penulisan Ilmiah","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"TIF150707","nama_matkul":"Workshop Sistem Cerdas","jumlah_sks":4,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"BID1601","nama_matkul":"Pancasila","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"BID1602","nama_matkul":"Agama","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"BID1603","nama_matkul":"Basic English","jumlah_sks":2,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"BID1605","nama_matkul":"Algoritma dan Pemrograman Dasar","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"BID1606","nama_matkul":"Konsep Basis Data","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"BID1607","nama_matkul":"Pengantar Bisnis","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"BID1608","nama_matkul":"Dasar-Dasar Manajemen","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"BID1604","nama_matkul":"Literasi Digital","jumlah_sks":2,"semester":1,"jenis_matkul":"Teori"},{"kd_matkul":"BID1609","nama_matkul":"Wokshop Sistem Informasi Manajemen","jumlah_sks":4,"semester":1,"jenis_matkul":"Praktikum"},{"kd_matkul":"MIF140707","nama_matkul":"Workshop Progressive Web App","jumlah_sks":4,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF140701","nama_matkul":"Literasi Digital","jumlah_sks":2,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"TIF160702","nama_matkul":"Statistika","jumlah_sks":2,"semester":6,"jenis_matkul":"Teori"},{"kd_matkul":"BID2601","nama_matkul":"Kewarganegaraan","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID2602","nama_matkul":"Bahasa Indonesia","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID2603","nama_matkul":"Intermediate English","jumlah_sks":2,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"BID2604","nama_matkul":"Manajemen Basis Data","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID2605","nama_matkul":"Pemrograman Berbasis Obyek","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID2606","nama_matkul":"Matematika Bisnis","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID2607","nama_matkul":"Manajemen Pemasaran Digital","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID2608","nama_matkul":"Statistika Ekonomi dan Bisnis","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID2609","nama_matkul":"Workshop Analisis Pemasaran  Digital","jumlah_sks":4,"semester":2,"jenis_matkul":"Praktikum"},{"kd_matkul":"BID4601","nama_matkul":"Manajemen Proyek Sistem  Informasi","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"BID4602","nama_matkul":"E-Commerce","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"BID4603","nama_matkul":"Keamanan Jaringan","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID460","nama_matkul":"Perilaku Organisasi","jumlah_sks":2,"semester":2,"jenis_matkul":"Teori"},{"kd_matkul":"BID4605","nama_matkul":"Manajemen Mutu","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"BID4606","nama_matkul":"Manajemen Resiko","jumlah_sks":3,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"BID4607","nama_matkul":"Workshop Sistem Informasi  Lanjutan","jumlah_sks":4,"semester":4,"jenis_matkul":"Praktikum"},{"kd_matkul":"BID4608","nama_matkul":"Techno-Sociopreneur","jumlah_sks":2,"semester":4,"jenis_matkul":"Teori"},{"kd_matkul":"Saka","nama_matkul":"saka","jumlah_sks":6,"semester":3,"jenis_matkul":"Praktikum"}]';

        $matkulData = json_decode($json, true);

        $matkul = array_map(function ($matkul) {
            return [
                'kd_matkul' => $matkul['kd_matkul'],
                'nama_matkul' => $matkul['nama_matkul'],
                'jumlah_sks' => $matkul['jumlah_sks'],
                'semester' => $matkul['semester'],
                'jenis_matkul' => $matkul['jenis_matkul'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $matkulData);

        DB::table('data_matkul')->upsert($matkul, ['kd_matkul']);
    }
}
