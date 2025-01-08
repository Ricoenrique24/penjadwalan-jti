<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\Teknisi;

class JadwalDosen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pastikan user sudah login
        $userRole = Auth::user()->status;
        $id = ($userRole == 'dosen') ? Dosen::where('nip', Auth::user()->nip)->first()->id : Teknisi::where('nik', Auth::user()->nip)->first()->id;
        $userId = $id;

        // Query Jadwal berdasarkan role user
        if ($userRole === 'dosen') {
            // Jika user adalah dosen, ambil jadwal berdasarkan id_dosen
            $dataJadwal = Jadwal::with('dosens.dosen', 'teknisis.teknisi', 'jam', 'matkul', 'ruangan')
                ->whereHas('dosens.dosen', function ($query) use ($userId) {
                    $query->where('id', $userId);
                })
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
                ->get()
                ->sortBy([
                    fn($jadwal) => $jadwal->jam->jam_awal,
                    fn($jadwal) => $jadwal->jam->jam_akhir
                ]);
        }

        // return response()->json($dataJadwal);

        return view('dosen.jadwal', compact('dataJadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
