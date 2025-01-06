<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DataDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // // Mengambil data dari API eksternal
        // $response = Http::get('http://localhost:8001/api/dosen'); // Ganti dengan URL API Anda

        // // Memastikan jika request berhasil
        // if ($response->successful()) {
        //     $dosenData = $response->json(); // Asumsi data berada di dalam key 'data'

        //     // Menyimpan data dosen ke dalam tabel 'data_dosen'
        //     $dosen = array_map(function ($dosen) {
        //         return [
        //             'kd_dosen' => $dosen['kd_dosen'],
        //             'nip' => $dosen['nip'],
        //             'nama_dosen' => $dosen['nama_dosen'],
        //             'jenis_kelamin' => $dosen['jenis_kelamin'],
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ];
        //     }, $dosenData);

        //     DB::table('data_dosen')->insert($dosen);
        // } else {
        //     // Jika request gagal, tampilkan pesan kesalahan
        //     echo "Gagal mengambil data dari API.";
        // }


        $json = '[{"kd_dosen":"DSN00002","nip":"199002272018032001","nama_dosen":"Trismayanti Dwi Puspitasari","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00003","nip":"197405192003121002","nama_dosen":"Nugroho Setyo Wibowo","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00004","nip":"197111151998021001","nama_dosen":"Adi Heru Utomo","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00005","nip":"198012122005011001","nama_dosen":"Prawidya Destarianto","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00006","nip":"197008311998031001","nama_dosen":"Moh. Munih Dian Widianta","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00007","nip":"197909212005011001","nama_dosen":"I Putu Dody Lesmana","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00008","nip":"19781011 200501 2 00","nama_dosen":"Elly Antika","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00009","nip":"198511282008121002","nama_dosen":"Aji Seto Arifianto","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00010","nip":"199205282018032001","nama_dosen":"Bety Etikasari","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00011","nip":"198608022015042002","nama_dosen":"Ratih Ayuninghemi","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00012","nip":"199112112018031001","nama_dosen":"Khafidurrohman Agustianto","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00013","nip":"199203022018032001","nama_dosen":"Zilvanhisna Emka Fitri","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00014","nip":"198907102019031010","nama_dosen":"Ery Setiyawan Jullev Atmadji","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00015","nip":"198801172019031008","nama_dosen":"I Gede Wiryawan","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00016","nip":"199408122019031013","nama_dosen":"Mukhamad Angga Gumilang","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00017","nip":"D198901152021041","nama_dosen":"Lukman Hakim","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00018","nip":"D199305102021032","nama_dosen":"Lukie Perdanasari","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00019","nip":"D199308312021032","nama_dosen":"Arvita Agus Kurniasari","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00020","nip":"198106152006041002","nama_dosen":"Syamsul Arifin","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00021","nip":"19710408 2001121003","nama_dosen":"Wahyu Kurnia Dewanto","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00022","nip":"198302032006041003","nama_dosen":"Hendra Yufit Riskiawan","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00023","nip":"197808192005012001","nama_dosen":"Ika Widiastuti","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00024","nip":"198005172008121002","nama_dosen":"Dwi Putro Sarwo Setyohadi","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00025","nip":"197709292005011003","nama_dosen":"Didit Rahmat Hartadi","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00026","nip":"198301092018031001","nama_dosen":"Hermawan Arief Putranto","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00029","nip":"19880702 201903 1 01","nama_dosen":"Husin","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00031","nip":"199104292019031011","nama_dosen":"Faisal Lutfi Afriansyah","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00032","nip":"198804042020122013","nama_dosen":"Pramuditha Shinta Dewi Puspitasari","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00033","nip":"197306172018051001","nama_dosen":"Ely Mulyadi","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00036","nip":"198907102019031010","nama_dosen":"Ery Setiyawan Jullev Atmadji","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00038","nip":"199408122019031013","nama_dosen":"Mukhamad Angga Gumilang","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00040","nip":"12345678910","nama_dosen":"Muhammad Hafidh Firmansyah","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00041","nip":"197907032003121001","nama_dosen":"Surateno","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00042","nip":"197808172003121005","nama_dosen":"Agus Hariyanto","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00043","nip":"197011282003121001","nama_dosen":"Hariyono Rakhmad","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00044","nip":"197809082005011001","nama_dosen":"Denny Wijanarko","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00045","nip":"197808162005011002","nama_dosen":"Beni Widiawan","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00046","nip":"197009292003121001","nama_dosen":"Yogiswara","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00047","nip":"197308312008011003","nama_dosen":"Agus Purwadi","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00048","nip":"198406252015041004","nama_dosen":"Bekti Maryuni Susanto","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00049","nip":"198510312018031001","nama_dosen":"Victor Phoa","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00050","nip":"199411232020122010","nama_dosen":"Lalitya Nindita Sahenda","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00051","nip":"198606092008122004","nama_dosen":"Nanik Anita Mukhlisoh","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00052","nip":"D199510302021032","nama_dosen":"Puji Hastuti","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00053","nip":"D199405092021032","nama_dosen":"Qonitatul Hasanah","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00054","nip":"D199310092021031","nama_dosen":"Raditya Arief Pratama","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00055","nip":"199706282022032018","nama_dosen":"Ulfa Emi Rahmawati","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00056","nip":"197110092003121001","nama_dosen":"Denny Trias Utomo","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00057","nip":"199305082022032013","nama_dosen":"Dia Bitari Mei Yuana","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00058","nip":"PKD.199440423202105","nama_dosen":"Mochammad Rifki Ulil Albab","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00059","nip":"PKD.19931124202105","nama_dosen":"Sholihah Ayu Wulandari","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00060","nip":"PKD.19920803202105","nama_dosen":"Ahmad Fahriyannur Rosyady","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00071","nip":"197009292003121001","nama_dosen":"Yogiswara","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00072","nip":"198903292019031007","nama_dosen":"Taufiq Rizaldi","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00073","nip":"199212272022031007","nama_dosen":"Choirul Huda","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00074","nip":"199304252022032008","nama_dosen":"Shabrina Choirunnisa","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00098","nip":"111","nama_dosen":"1","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00100","nip":"123","nama_dosen":"TESTING V2","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00105","nip":"finaltestingv2","nama_dosen":"Sakav2","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00106","nip":"finaltestingv3","nama_dosen":"Sakav3","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00107","nip":"Afis Asryullah Pratama","nama_dosen":"Afis Asryullah Pratama","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00108","nip":"Khen Dedes","nama_dosen":"Khen dedes","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00110","nip":"Mauthauddin Mustaqim","nama_dosen":"Mauthauddin Mustaqim","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00111","nip":"Reza Putra Pradana","nama_dosen":"Reza Putra Pradana","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00112","nip":"Akas Bagus Setiawan","nama_dosen":"Akas Bagus Setiawan","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00113","nip":"Fatimatuzzahra","nama_dosen":"Fatimatuzzahra","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00114","nip":"Mas&#039;ud Hermansyah","nama_dosen":"Mas&#039;ud Hermansyah","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00116","nip":"David Juli Ariadi","nama_dosen":"David Juli Ariadi","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00117","nip":"Prisilia Angel Tantri","nama_dosen":"Prisilia Angel Tantri","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00118","nip":"Rizky Adhitya Nugroho","nama_dosen":"Rizky Adhitya Nugroho","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00119","nip":"Muhammad Bahanan","nama_dosen":"Muhammad Bahanan","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00120","nip":"Mujiono","nama_dosen":"Mujiono","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00121","nip":"Dhony Manggala Putra","nama_dosen":"Dhony Manggala Putra","jenis_kelamin":"Laki-laki"},{"kd_dosen":"DSN00122","nip":"Muhammad Ainul Fikri","nama_dosen":"Muhammad Ainul Fikri","jenis_kelamin":"Laki-laki"}]';

        $dosenData = json_decode($json, true);

        $dosen = array_map(function ($dosen) {
            return [
                'kd_dosen' => $dosen['kd_dosen'],
                'nip' => html_entity_decode($dosen['nip']),
                'nama_dosen' => html_entity_decode($dosen['nama_dosen']),
                'jenis_kelamin' => $dosen['jenis_kelamin'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $dosenData);

        DB::table('data_dosen')->insert($dosen);
    }
}
