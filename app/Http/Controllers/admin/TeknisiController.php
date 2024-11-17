<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teknisi;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teknisi = Teknisi::orderBy('id', 'desc')->paginate(5);
        return view('admin.teknisi', compact('teknisi'));
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
        $teknisi = new Teknisi();
        $teknisi->nik             = $request->nik;
        $teknisi->nama_teknisi      = $request->nama_teknisi;
        $teknisi->jabatan   = $request->jabatan;
        $teknisi->save();


        return redirect()->route('adminTeknisi')->with('success', 'teknisi berhasil ditambahkan.');
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
        $teknisi = Teknisi::find($id);

        if (!$teknisi) {
            return redirect()->back()->with('error', 'teknisi tidak ditemukan.');
        }
        $teknisi->nik             = $request->nik;
        $teknisi->nama_teknisi      = $request->nama_teknisi;
        $teknisi->jabatan   = $request->jabatan;
        $teknisi->save();

        return redirect()->route('adminTeknisi')->with('success', 'teknisi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teknisi = Teknisi::find($id);

        if (!$teknisi) {
            return response()->json([
                'status' => 'error',
                'message' => 'teknisi tidak ditemukan'
            ], 404);
        }

        // Hapus data teknisi
        $teknisi->delete();

        return redirect()->route('adminTeknisi')->with('success', 'Dosen terkait berhasil dihapus.');
    }
}
