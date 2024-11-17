<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jam;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data jam dari tabel data_jam
        // $dataJam = Jam::all();
        $dataJam = Jam::orderBy('id', 'desc')->paginate(5);
        return view('admin.jam', compact('dataJam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simpan data baru tanpa validasi
        Jam::create([
            'sesi' => $request->sesi,
            'jam_awal' => $request->jam_awal,
            'jam_akhir' => $request->jam_akhir,
        ]);

        // return response()->json(200);

        return redirect()->route('adminJam')->with('success', 'Data jam berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Perbarui data berdasarkan ID
        $dataJam = Jam::findOrFail($id);

        $dataJam->sesi      = $request->sesi;
        $dataJam->jam_awal  = $request->jam_awal;
        $dataJam->jam_akhir = $request->jam_akhir;
        $dataJam->save();

        return redirect()->route('adminJam')->with('success', 'Data jam berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data berdasarkan ID
        $dataJam = Jam::findOrFail($id);
        $dataJam->delete();

        return redirect()->route('adminJam')->with('success', 'Data jam berhasil dihapus.');
    }
}
