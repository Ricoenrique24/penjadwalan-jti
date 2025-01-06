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
        $dataJadwal = Jadwal::with(['dosen', 'teknisi', 'matkul', 'matkul.koor_matkul.dosen', 'ruangan', 'jam' => function ($query) {
            $query->orderBy('jam_awal', 'asc');
        }])->orderBy('hari', 'desc')->get();
        $jam = Jam::all();
        $mataKuliah = Matkul::with('koor_matkul.dosen')->get();
        $dosen = Dosen::all();
        $teknisi = Teknisi::all();
        $ruangan = Ruangan::all();
        $ruangan = Ruangan::all();
        // dd($dataJadwal);

        // $jam = Jam::all(); // Ambil data jam
        // $mataKuliah = Matkul::with('koor_matkul.dosen')->get(); // Ambil data mata kuliah & koordinator
        // $dosen = Dosen::all(); // Ambil data dosen
        // $teknisi = Teknisi::all(); // Ambil data teknisi
        // $ruangan = Ruangan::all(); // Ambil data ruangan

        // return response()->json([
        //     'status' => 'success',
        //     'data' => $dataJadwal
        // ]);

        return view('admin.jadwal', compact('dataJadwal', 'jam', 'mataKuliah', 'dosen', 'teknisi', 'ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingJadwal = Jadwal::where('hari', $request->hari)
            ->where('id_jam', $request->jam)
            ->where('id_dosen', $request->dosen)
            ->where('id_ruangan', $request->ruangan)
            ->where('tahun_ajaran', $request->tahun_ajaran)
            ->where('semester', $request->semester)
            ->where('id_matkul', $request->mata_kuliah)
            ->first();

        if ($existingJadwal) {
            return back()->withErrors(['message' => 'Jadwal yang sama sudah ada.']);
        }

        // Membuat instance Jadwal baru
        $jadwal = new Jadwal();

        // Menetapkan nilai atribut untuk jadwal
        $jadwal->id_dosen = $request->dosen;
        $jadwal->id_teknisi = $request->teknisi;
        $jadwal->id_matkul = $request->mata_kuliah;
        $jadwal->hari = $request->hari;
        $jadwal->id_jam = $request->jam;
        $jadwal->tahun_ajaran = $request->tahun_ajaran;
        $jadwal->semester = $request->semester;
        $jadwal->id_ruangan = $request->ruangan;

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
        $existingJadwal = Jadwal::where('id', '!=', $id)
            ->where('hari', $request->hari)
            ->where('id_jam', $request->jam)
            ->where('id_dosen', $request->dosen)
            ->where('id_ruangan', $request->ruangan)
            ->where('tahun_ajaran', $request->tahun_ajaran)
            ->where('semester', $request->semester)
            ->where('id_matkul', $request->mata_kuliah)
            ->first();

        if ($existingJadwal) {
            return back()->withErrors(['message' => 'Jadwal yang sama sudah ada.']);
        }

        // Cari data jadwal berdasarkan ID
        $jadwal = Jadwal::find($id);

        // Menetapkan nilai atribut untuk jadwal
        $jadwal->id_dosen = $request->dosen;
        $jadwal->id_teknisi = $request->teknisi;
        $jadwal->id_matkul = $request->mata_kuliah;
        $jadwal->hari = $request->hari;
        $jadwal->id_jam = $request->jam;
        $jadwal->tahun_ajaran = $request->tahun_ajaran;
        $jadwal->semester = $request->semester;
        $jadwal->id_ruangan = $request->ruangan;

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
