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
    // public function index()
    // {

    //      $dosen = Dosen::orderBy('id', 'desc')->paginate(5);
    //     return view('admin.dosen', compact('dosen'));
    // }

    public function index(Request $request)
    {
        $query = $request->input('search'); // Mendapatkan query pencarian
        $dosen = Dosen::query();
    
        // Jika ada pencarian, terapkan pencarian
        if ($query) {
            $dosen->where('nama_dosen', 'like', "%$query%")
                ->orWhere('nip', 'like', "%$query%")
                ->orWhere('kd_dosen', 'like', "%$query%");
        }
    
        // Mengurutkan berdasarkan ID terbesar (data terbaru)
        $dosen = $dosen->orderBy('id', 'desc');
    
        // Jika ada pencarian, ambil semua data, jika tidak, gunakan pagination
        $dosen = $query ? $dosen->get() : $dosen->paginate(5);
    
        return view('admin.dosen', compact('dosen', 'query'));
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


        return redirect()->route('adminDosen')->with('success', 'Dosen berhasil ditambahkan.');
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

        return redirect()->route('adminDosen')->with('success', 'Dosen berhasil diperbarui.');
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

        return redirect()->route('adminDosen')->with('success', 'Dosen terkait berhasil dihapus.');
    }
}
