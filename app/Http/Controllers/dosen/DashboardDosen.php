<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use App\Models\Jadwal;
use App\Models\User;

class DashboardDosen extends Controller
{
    public function index()
    {
        // Set Bahasa Indonesia dan Zona Waktu
        App::setLocale('id');
        Carbon::setLocale('id');

        // Pastikan user sudah login
        $userId = Auth::user()->id;
        $userRole = Auth::user()->status;

        // Tanggal sekarang dalam GMT+7
        $currentDate = now('Asia/Jakarta');
        $currentDay = $currentDate->translatedFormat('l');

        // Query Jadwal berdasarkan role user
        if ($userRole === 'dosen') {
            // Jika user adalah dosen, ambil jadwal berdasarkan id_dosen
            $dataJadwal = Jadwal::with(['dosen', 'teknisi'])
                ->where('id_dosen', $userId)
                ->where('hari', $currentDay)
                ->orderBy('jam', 'asc')
                ->get();
        } elseif ($userRole === 'teknisi') {
            // Jika user adalah teknisi, ambil jadwal berdasarkan id_teknisi
            $dataJadwal = Jadwal::with(['dosen', 'teknisi'])
                ->where('id_teknisi', $userId)
                ->where('hari', $currentDay)
                ->orderBy('jam', 'asc')
                ->get();
        } 

        // return response()->json($dataJadwal);

        return view('dosen.dashboard', compact('dataJadwal'));
    }
}