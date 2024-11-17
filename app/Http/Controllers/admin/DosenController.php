<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // Mendapatkan semua data dosen
        // $dosen = Dosen::all();
        // return response()->json([
        //     'status' => 'success',
        //     'data' => $dosen
        // ]);

        $dosen = Dosen::orderBy('id', 'desc')->paginate(5);
        return view('admin.dosen', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Jika ingin menampilkan form (opsional jika menggunakan API)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        
        // Simpan data langsung ke database
        $dosen = new Dosen();
        $dosen->kd_dosen        = $request->kd_dosen;
        $dosen->nip             = $request->nip;
        $dosen->nama_dosen      = $request->nama_dosen;
        $dosen->jenis_kelamin   = $request->jenis_kelamin;
        $dosen->save();


      return redirect()->route('admin-dosen')->with('success', 'Dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari data dosen berdasarkan ID
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Debugging jika diperlukan
        // dd($request, $id);

        // Cari data dosen berdasarkan ID
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return redirect()->back()->with('error', 'Dosen tidak ditemukan.');
        }

        // Update data dosen
        $dosen->kd_dosen = $request->kd_dosen;
        $dosen->nip = $request->nip;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->save();

          return redirect()->route('admin-dosen')->with('success', 'Dosen berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data dosen berdasarkan ID
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen tidak ditemukan'
            ], 404);
        }

        // Hapus data dosen
        $dosen->delete();

         return redirect()->route('admin-dosen')->with('success', 'Dosen terkait berhasil dihapus.');
    }
}
