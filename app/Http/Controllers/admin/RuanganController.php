<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangan = Ruangan::orderBy('id', 'desc')->paginate(5);
        return view('admin.ruangan', compact('ruangan'));
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
        $ruangan = new Ruangan();
        $ruangan->kd_ruangan             = $request->kd_ruangan;
        $ruangan->nama_ruangan      = $request->nama_ruangan;
        $ruangan->kapasitas   = $request->kapasitas;
        // $ruangan->status   = $request->status;
        $ruangan->save();


        return redirect()->route('adminRuangan')->with('success', 'ruangan berhasil ditambahkan.');
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
        $ruangan = Ruangan::find($id);

        if (!$ruangan) {
            return redirect()->back()->with('error', 'ruangan tidak ditemukan.');
        }
        $ruangan->kd_ruangan             = $request->kd_ruangan;
        $ruangan->nama_ruangan      = $request->nama_ruangan;
        $ruangan->kapasitas   = $request->kapasitas;
        // $ruangan->status   = $request->status;
        $ruangan->save();

        return redirect()->route('adminRuangan')->with('success', 'ruangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = Ruangan::find($id);

        if (!$ruangan) {
            return response()->json([
                'status' => 'error',
                'message' => 'ruangan tidak ditemukan'
            ], 404);
        }

        // Hapus data ruangan
        $ruangan->delete();

        return redirect()->route('adminRuangan')->with('success', 'Ruangan terkait berhasil dihapus.');
    }
}
