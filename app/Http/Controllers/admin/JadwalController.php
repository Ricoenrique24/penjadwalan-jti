<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Jam;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Teknisi;
use App\Models\Ruangan;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJadwal = Jadwal::orderBy('hari', 'desc')
                        ->orderBy('jam', 'asc')
                        ->get();

        $jam = Jam::all(); // Ambil data jam
        $mataKuliah = Matkul::all(); // Ambil data mata kuliah
        $dosen = Dosen::all(); // Ambil data dosen
        $teknisi = Teknisi::all(); // Ambil data teknisi
        $ruangan = Ruangan::all(); // Ambil data ruangan

        // return response()->json([
        //     'status' => 'success',
        //     'data' => $dataJadwal
        // ]);

        return view('admin.jadwal',compact('dataJadwal', 'jam', 'mataKuliah', 'dosen', 'teknisi', 'ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingJadwal = Jadwal::where('hari', $request->hari)
                            ->where('jam', $request->jam)
                            ->first();

        if ($existingJadwal) {
            return back()->withErrors(['message' => 'Jadwal yang sama sudah ada.']);
        }

        // Temukan objek terkait berdasarkan ID
        $matkul = Matkul::find($request->mata_kuliah);
        $dosen = Dosen::find($request->dosen);
        $teknisi = Teknisi::find($request->teknisi);

        // Membuat instance Jadwal baru
        $jadwal = new Jadwal();

        // Menetapkan nilai atribut untuk jadwal
        $jadwal->id_dosen = $dosen->id;
        $jadwal->id_teknisi = $teknisi->id;
        $jadwal->id_matkul = $matkul->id;
        $jadwal->hari = $request->hari;
        $jadwal->jam = $request->jam;
        $jadwal->matkul = $matkul->nama_matkul;
        $jadwal->tahun_ajaran = $request->input('tahun_ajaran');
        $jadwal->semester = $request->semester;
        $jadwal->ruangan = $request->ruangan;
        $jadwal->dosen = $dosen->nama_dosen;
        $jadwal->teknisi = $teknisi->nama_teknisi;

        // Menyimpan data ke database
        $jadwal->save();

        // Redirect atau memberikan respons setelah berhasil menyimpan
        return redirect()->route('adminJadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi jika jadwal yang sama sudah ada (berdasarkan hari dan jam)
        $existingJadwal = Jadwal::where('hari', $request->hari)
                                ->where('jam', $request->jam)
                                ->where('id', '!=', $id) // Pastikan bukan jadwal yang sedang diupdate
                                ->first();

        if ($existingJadwal) {
            return back()->withErrors(['message' => 'Jadwal yang sama sudah ada.']);
        }

        // Temukan objek terkait berdasarkan ID
        $matkul = Matkul::find($request->mata_kuliah);
        $dosen = Dosen::find($request->dosen);
        $teknisi = Teknisi::find($request->teknisi);

        // Cari data jadwal berdasarkan ID
        $jadwal = Jadwal::find($id);

        // Menetapkan nilai atribut untuk jadwal
        $jadwal->id_dosen = $dosen->id;
        $jadwal->id_teknisi = $teknisi->id;
        $jadwal->hari = $request->hari;
        $jadwal->jam = $request->jam;
        $jadwal->matkul = $matkul->nama_matkul;
        $jadwal->tahun_ajaran = $request->input('tahun_ajaran');
        $jadwal->semester = $request->semester;
        $jadwal->ruangan = $request->ruangan;
        $jadwal->dosen = $dosen->nama_dosen;
        $jadwal->teknisi = $teknisi->nama_teknisi;

        // Simpan perubahan
        $jadwal->save();

        // Redirect atau memberikan respons setelah berhasil memperbarui
        return redirect()->route('adminJadwal')->with('success', 'Jadwal berhasil diperbarui.');
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

        return redirect()->route('adminJadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }
}
