<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\KoorMatkul;
use Illuminate\Http\Request;
use App\Models\Matkul;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = Matkul::with('koor_matkul.dosen')->orderBy('id', 'desc')->get();

        $dosen = Dosen::all();
        return view('admin.mataKuliah', compact('matkul', 'dosen'));
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

        // dd($request->all());
        // Simpan data langsung ke database
        $matkul = new Matkul();
        $matkul->kd_matkul = $request->kd_matkul;
        $matkul->nama_matkul = $request->nama_matkul;
        $matkul->jumlah_sks = $request->jumlah_sks;
        $matkul->semester = $request->semester;
        $matkul->jenis_matkul = $request->jenis_matkul;
        $matkul->save();

        foreach ($request->koor_matkul as $koor) {
            KoorMatkul::create([
                'id_matkul' => $matkul->id,
                'id_dosen' => $koor
            ]);
        }


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
        $matkul->jenis_matkul = $request->jenis_matkul;
        $matkul->save();

        foreach ($request->koor_matkul as $koor) {
            KoorMatkul::updateOrCreate(
                [
                    'id_matkul' => $matkul->id,
                    'id_dosen' => $koor
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }

        return redirect()->route('adminMataKuliah')->with('success', 'Matkul berhasil diperbarui.');
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
        KoorMatkul::where('id_matkul', $id)->delete();

        return redirect()->route('adminMataKuliah')->with('success', 'matkul terkait berhasil dihapus.');
    }
}
