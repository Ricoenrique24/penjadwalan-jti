<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Matkul;
use Illuminate\Support\Facades\Auth;

class BebanDosen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil id dari usernya (Gunakan Auth)
        $userId = Auth::id();
        $userRole = Auth::user()->status; // Pastikan ada atribut 'role' pada tabel users, misalnya 'dosen' atau 'teknisi'

        // Lalu, Tarik data jadwal berdasarkan user dulu
        if ($userRole == 'dosen') {
            // Jika user adalah dosen, ambil jadwal berdasarkan id_dosen
            $dataJadwal = Jadwal::where('id_dosen', $userId) // Mengambil jadwal berdasarkan id_dosen
                                ->get('matkul');
        } elseif ($userRole == 'teknisi') {
            // Jika user adalah teknisi, ambil jadwal berdasarkan id_teknisi
            $dataJadwal = Jadwal::where('id_teknisi', $userId) // Mengambil jadwal berdasarkan id_teknisi
                                ->get('matkul');
        } else {
            // Jika user tidak terdaftar sebagai dosen atau teknisi, beri response atau penanganan lain
            return response()->json(['message' => 'User tidak memiliki akses untuk melihat jadwal.'], 403);
        }

        // Tarik matkul berdasarkan matkul yang ada di DB
        $matkuls = collect(); 
        $total_beban = 0;

        foreach ($dataJadwal as $item) {
            // Mengambil data matkul berdasarkan nama matkul
            $matkul = Matkul::where('nama_matkul', $item['matkul'])->firstOrFail();

            // Mengambil jumlah pengampu (dosen atau teknisi) yang mengajar mata kuliah tersebut
            $jumlahPengampu = Jadwal::where('id_matkul', $matkul->id)
                ->distinct($userRole == 'dosen' ? 'id_dosen' : 'id_teknisi') // Memilih id_dosen untuk dosen dan id_teknisi untuk teknisi
                ->count($userRole == 'dosen' ? 'id_dosen' : 'id_teknisi'); // Menghitung jumlah pengampu yang mengajar matkul tersebut

            // Menggabungkan data matkul dan jumlah pengampu
            $item['matkul'] = $matkul->nama_matkul;
            $item['sks']    = $matkul->jumlah_sks;
            $item['tim_teaching'] = $jumlahPengampu;
            $item['sks_individu'] = $matkul->jumlah_sks / $jumlahPengampu;

            $total_beban += $matkul->jumlah_sks / $jumlahPengampu;
            
            // Menyimpan hasil ke koleksi
            $matkuls->push($item);
        }


        // return response()->json($total_beban);
        return view('dosen.beban', compact('matkuls','total_beban'));
    }
}
