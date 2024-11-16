<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return response()->json([
            'status' => 'success',
            'data' => $jadwal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tidak perlu jika API, hanya untuk tampilan form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jadwal = Jadwal::create([
            'hari' => $request->hari,
            'jam' => $request->jam,
            'matkul' => $request->matkul,
            'tahun-ajaran' => $request->input('tahun-ajaran'),
            'semester' => $request->semester,
            'ruangan' => $request->ruangan,
            'dosen' => $request->dosen,
            'teknisi' => $request->teknisi,
            'kelas' => $request->kelas,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Jadwal berhasil ditambahkan',
            'data' => $jadwal
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jadwal tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $jadwal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tidak perlu jika API, hanya untuk tampilan form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Debugging jika diperlukan
        // dd($request, $id);

        // Cari data jadwal berdasarkan ID
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');
        }

        // Update data jadwal
        $jadwal->hari = $request->hari;
        $jadwal->jam = $request->jam;
        $jadwal->matkul = $request->matkul;
        $jadwal->tahun_ajaran = $request->input('tahun-ajaran');
        $jadwal->semester = $request->semester;
        $jadwal->ruangan = $request->ruangan;
        $jadwal->dosen = $request->dosen;
        $jadwal->teknisi = $request->teknisi;
        $jadwal->kelas = $request->kelas;
        $jadwal->save();

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jadwal tidak ditemukan'
            ], 404);
        }

        $jadwal->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Jadwal berhasil dihapus'
        ]);
    }
}
