<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use App\Models\Jadwal;
use App\Models\Teknisi;
use App\Models\User;

class DashboardDosen extends Controller
{
    public function index()
    {
        // Set Bahasa Indonesia dan Zona Waktu
        App::setLocale('id');
        Carbon::setLocale('id');

        // Pastikan user sudah login
        $userRole = Auth::user()->status;
        $id = ($userRole == 'dosen') ? Dosen::where('nip', Auth::user()->nip)->first()->id : Teknisi::where('nik', Auth::user()->nip)->first()->id;
        $userId = $id;

        // Tanggal sekarang dalam GMT+7
        $currentDate = now('Asia/Jakarta');
        $currentDay = $currentDate->translatedFormat('l');

        // Query Jadwal berdasarkan role user
        if ($userRole === 'dosen') {
            // Jika user adalah dosen, ambil jadwal berdasarkan id_dosen
            $dataJadwal = Jadwal::with('dosens.dosen', 'teknisis.teknisi', 'jam', 'matkul', 'ruangan')
                ->whereHas('dosens.dosen', function ($query) use ($userId) {
                    $query->where('id', $userId);
                })
                ->where('hari', $currentDay)
                ->get()
                ->sortBy([
                    fn($jadwal) => $jadwal->jam->jam_awal,
                    fn($jadwal) => $jadwal->jam->jam_akhir
                ]);
        } elseif ($userRole === 'teknisi') {
            // Jika user adalah teknisi, ambil jadwal berdasarkan id_teknisi
            $dataJadwal = Jadwal::with('dosens.dosen', 'teknisis.teknisi', 'jam', 'matkul', 'ruangan')
                ->whereHas('teknisis.teknisi', function ($query) use ($userId) {
                    $query->where('id', $userId);
                })
                ->where('hari', $currentDay)
                ->get()
                ->sortBy([
                    fn($jadwal) => $jadwal->jam->jam_awal,
                    fn($jadwal) => $jadwal->jam->jam_akhir
                ]);
        }

        // return response()->json($dataJadwal);

        return view('dosen.dashboard', compact('dataJadwal'));
    }
}
