<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen = [
            ['kd_dosen' => substr('199002272018032001', 4, 5), 'nip' => '199002272018032001', 'nama_dosen' => 'Trismayanti Dwi Puspitasari', 'jenis_kelamin' => 'Perempuan'],
            ['kd_dosen' => substr('197405192003121002', 4, 5), 'nip' => '197405192003121002', 'nama_dosen' => 'Nugroho Setyo Wibowo', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('197111151998021001', 4, 5), 'nip' => '197111151998021001', 'nama_dosen' => 'Adi Heru Utomo', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('198012122005011001', 4, 5), 'nip' => '198012122005011001', 'nama_dosen' => 'Prawidya Destarianto', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('197008311998031001', 4, 5), 'nip' => '197008311998031001', 'nama_dosen' => 'Moh. Munih Dian Widianta', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('197909212005011001', 4, 5), 'nip' => '197909212005011001', 'nama_dosen' => 'I Putu Dody Lesmana', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('19781011200501200', 4, 5), 'nip' => '19781011200501200', 'nama_dosen' => 'Elly Antika', 'jenis_kelamin' => 'Perempuan'],
            ['kd_dosen' => substr('198511282008121002', 4, 5), 'nip' => '198511282008121002', 'nama_dosen' => 'Aji Seto Arifianto', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('199205282018032001', 4, 5), 'nip' => '199205282018032001', 'nama_dosen' => 'Bety Etikasari', 'jenis_kelamin' => 'Perempuan'],
            ['kd_dosen' => substr('198608022015042002', 4, 5), 'nip' => '198608022015042002', 'nama_dosen' => 'Ratih Ayuninghemi', 'jenis_kelamin' => 'Perempuan'],
            ['kd_dosen' => substr('199112112018031001', 4, 5), 'nip' => '199112112018031001', 'nama_dosen' => 'Khafidurrohman Agustianto', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('199203022018032001', 4, 5), 'nip' => '199203022018032001', 'nama_dosen' => 'Zilvanhisna Emka Fitri', 'jenis_kelamin' => 'Perempuan'],
            ['kd_dosen' => substr('198907102019031010', 4, 5), 'nip' => '198907102019031010', 'nama_dosen' => 'Ery Setiyawan Jullev Atmadji', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('198801172019031008', 4, 5), 'nip' => '198801172019031008', 'nama_dosen' => 'I Gede Wiryawan', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('199408122019031013', 4, 5), 'nip' => '199408122019031013', 'nama_dosen' => 'Mukhamad Angga Gumilang', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('D198901152021041', 4, 5), 'nip' => 'D198901152021041', 'nama_dosen' => 'Lukman Hakim', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('D199305102021032', 4, 5), 'nip' => 'D199305102021032', 'nama_dosen' => 'Lukie Perdanasari', 'jenis_kelamin' => 'Perempuan'],
            ['kd_dosen' => substr('D199308312021032', 4, 5), 'nip' => 'D199308312021032', 'nama_dosen' => 'Arvita Agus Kurniasari', 'jenis_kelamin' => 'Perempuan'],
            ['kd_dosen' => substr('198106152006041002', 4, 5), 'nip' => '198106152006041002', 'nama_dosen' => 'Syamsul Arifin', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('19710408 2001121003', 4, 5), 'nip' => '19710408 2001121003', 'nama_dosen' => 'Wahyu Kurnia Dewanto', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('198302032006041003', 4, 5), 'nip' => '198302032006041003', 'nama_dosen' => 'Hendra Yufit Riskiawan', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('197808192005012001', 4, 5), 'nip' => '197808192005012001', 'nama_dosen' => 'Ika Widiastuti', 'jenis_kelamin' => 'Perempuan'],
            ['kd_dosen' => substr('198005172008121002', 4, 5), 'nip' => '198005172008121002', 'nama_dosen' => 'Dwi Putro Sarwo Setyohadi', 'jenis_kelamin' => 'Laki-laki'],
            ['kd_dosen' => substr('197709292005011003', 4, 5), 'nip' => '197709292005011003', 'nama_dosen' => 'Didit Rahmat Hartadi', 'jenis_kelamin' => 'Laki-laki'],
        ];

        DB::table('data_dosen')->insert($dosen);
    }
}
