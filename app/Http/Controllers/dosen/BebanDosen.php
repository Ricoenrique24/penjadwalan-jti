<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Teknisi;
use Illuminate\Support\Facades\Auth;

class BebanDosen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil id dari usernya (Gunakan Auth)
        $userRole = Auth::user()->status; // Pastikan ada atribut 'role' pada tabel users, misalnya 'dosen' atau 'teknisi'
        $id = ($userRole == 'dosen') ? Dosen::where('nip', Auth::user()->nip)->first()->id : Teknisi::where('nik', Auth::user()->nip)->first()->id;
        $userId = $id;

        $dataJadwal = Jadwal::with(['dosens.dosen', 'teknisis.teknisi', 'matkul', 'matkul.koor_matkul', 'matkul.jenis_matkul', 'ruangan', 'jam' => function ($query) {
            $query->orderBy('jam_awal', 'asc');
        }])
            ->withCount('dosens as jumlah_dosen')
            ->withCount('teknisis as jumlah_teknisi')
            ->when($userRole == 'dosen', function ($query) use ($userId) {
                // dosen
                return $query->whereHas('dosens.dosen', function ($query) use ($userId) {
                    $query->where('id', $userId);
                });
            })
            ->when($userRole == 'teknisi', function ($query) use ($userId) {
                // teknisi
                return $query->whereHas('teknisis.teknisi', function ($query) use ($userId) {
                    $query->where('id', $userId);
                });
            })
            ->orderBy('hari', 'desc')
            ->get();

        // dd($dataJadwal);

        $matkuls = $dataJadwal->map(function ($jadwal) use ($userRole) {
            return [
                'matkul' => $jadwal->matkul->nama_matkul,
                'sks' => $jadwal->matkul->sks_teori + $jadwal->matkul->sks_praktikum,
                'tim_teaching' => ($userRole == 'dosen') ? $jadwal->dosens->count() : $jadwal->teknisis->count(),
                'sks_individu' => ($jadwal->matkul->sks_teori + $jadwal->matkul->sks_praktikum) / (($userRole == 'dosen') ? $jadwal->dosens->count() : $jadwal->teknisis->count())
            ];
        });

        $total_beban = $matkuls->sum('sks_individu');

        // dd($dataMapped, $total_beban);

        return view('dosen.beban', compact('matkuls', 'total_beban'));
    }
}
