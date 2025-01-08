<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua pengguna
        // $pengguna = User::all();
        $pengguna = User::orderBy('id', 'desc')->get();
        // Menghitung jumlah pengguna berdasarkan status
        $totalDosen     = User::where('status', 'dosen')->count();
        $totalTeknisi   = User::where('status', 'teknisi')->count();
        $totalAdmin     = User::where('status', 'admin')->count();

        $dosen = Dosen::all();
        $teknisi = Teknisi::all();

        // return response()->json([
        //     'totalTeknisi' => $totalTeknisi,
        //     'totalDosen' => $totalDosen,
        //     'totalAdmin' => $totalAdmin,
        //     'pengguna' => $pengguna,
        // ]);

        return view('admin.pengguna', compact('pengguna', 'totalTeknisi', 'totalDosen', 'totalAdmin', 'dosen', 'teknisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan pengguna baru tanpa validasi

        if ($request->status == 'dosen') {
            $dosen = Dosen::where('id', $request->dosen)->first();

            $user = User::create([
                'name' => $dosen->nama_dosen,
                'email' => $dosen->nip . '@polije.ac.id',
                'nip' => $dosen->nip,
                'status' => $request->status,
                'password' => bcrypt($request->password),
            ]);
        } elseif ($request->status == 'teknisi') {
            $teknisi = Teknisi::where('id', $request->teknisi)->first();

            $user = User::create([
                'name' => $teknisi->nama_teknisi,
                'email' => $teknisi->nik . '@polije.ac.id',
                'nip' => $teknisi->nik,
                'status' => $request->status,
                'password' => bcrypt($request->password),
            ]);
        } else {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'password' => bcrypt($request->password),
            ]);
        }
        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('adminPengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Perbarui data pengguna berdasarkan ID tanpa validasi
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nip = $request->nip;
        $user->status = $request->status;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('adminPengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data pengguna berdasarkan ID
        $user = User::findOrFail($id);
        $user->delete();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('adminPengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
