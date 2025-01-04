<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matkul;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = Matkul::with('koor_matkul.dosen')->orderBy('id', 'desc')->paginate(5);
        return view('admin.mataKuliah', compact('matkul'));
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
        // Simpan data langsung ke database
        $matkul = new Matkul();
        $matkul->kd_matkul = $request->kd_matkul;
        $matkul->nama_matkul = $request->nama_matkul;
        $matkul->jumlah_sks = $request->jumlah_sks;
        $matkul->semester = $request->semester;
        $matkul->save();


        return redirect()->route('adminMataKuliah')->with('success', 'matkul berhasil ditambahkan.');
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
        $matkul = Matkul::find($id);

        if (!$matkul) {
            return redirect()->back()->with('error', 'matkul tidak ditemukan.');
        }
        $matkul->kd_matkul             = $request->kd_matkul;
        $matkul->nama_matkul      = $request->nama_matkul;
        $matkul->jumlah_sks = $request->jumlah_sks;
        $matkul->semester = $request->semester;
        $matkul->save();

        return redirect()->route('admin.Matkul')->with('success', 'Matkul berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matkul = Matkul::find($id);

        if (!$matkul) {
            return response()->json([
                'status' => 'error',
                'message' => 'matkul tidak ditemukan'
            ], 404);
        }

        // Hapus data matkul
        $matkul->delete();

        return redirect()->route('adminMataKuliah')->with('success', 'matkul terkait berhasil dihapus.');
    }
}
