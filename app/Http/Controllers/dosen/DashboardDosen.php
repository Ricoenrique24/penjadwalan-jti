<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class DashboardDosen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJadwal = Jadwal::with(['dosen', 'teknisi'])
        ->where('tahun_ajaran', '2024/2025')
        ->get();

        return response()->json($dataJadwal);
        // return view('dosen.dashboard', compact('jadwal'));
    }
}