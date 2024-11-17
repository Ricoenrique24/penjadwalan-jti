<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
class KelasController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy('id', 'desc')->paginate(5);
        return view('admin.kelas', compact('kelas'));
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
        $kelas = new Kelas();
        $kelas->semester = $request->semester;
        $kelas->golongan = $request->golongan;
        $kelas->prodi = $request->prodi;
        $kelas->total_mhs   = $request->total_mhs;
        $kelas->save();


        return redirect()->route('adminKelas')->with('success', 'kelas berhasil ditambahkan.');
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
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect()->back()->with('error', 'kelas tidak ditemukan.');
        }
        $kelas->semester = $request->semester;
        $kelas->golongan = $request->golongan;
        $kelas->prodi = $request->prodi;
        $kelas->total_mhs   = $request->total_mhs;
        $kelas->save();

        return redirect()->route('adminKelas')->with('success', 'kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'status' => 'error',
                'message' => 'kelas tidak ditemukan'
            ], 404);
        }

        // Hapus data kelas
        $kelas->delete();

        return redirect()->route('adminKelas')->with('success', 'Dosen terkait berhasil dihapus.');
    }
}
