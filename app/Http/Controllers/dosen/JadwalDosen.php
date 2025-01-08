<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;

class JadwalDosen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pastikan user sudah login
        $userId = Auth::user()->id;
        $userRole = Auth::user()->status;

        // Query Jadwal berdasarkan role user
        if ($userRole === 'dosen') {
            // Jika user adalah dosen, ambil jadwal berdasarkan id_dosen
            $dataJadwal = Jadwal::with(['dosen', 'teknisi','matkul'])
                ->where('id_dosen', $userId)
                ->orderBy('id_jam', 'asc')
                ->get();
        } elseif ($userRole === 'teknisi') {
            // Jika user adalah teknisi, ambil jadwal berdasarkan id_teknisi
            $dataJadwal = Jadwal::with(['dosen', 'teknisi','matkul'])
                ->where('id_teknisi', $userId)
                ->orderBy('id_jam', 'asc')
                ->get();
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
