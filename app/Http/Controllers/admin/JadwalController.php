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
use Carbon\Carbon;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $tahunAjaran = Jadwal::select('tahun_ajaran')->groupBy('tahun_ajaran')->get();
        $tahunAjaranNow = Carbon::now()->format('Y') . "/" . Carbon::now()->addYear(1)->format('Y');
        $tahunAjaranSelected = $request->tahun_ajaran ?? $tahunAjaranNow;

        $dataJadwal = Jadwal::with(['dosens.dosen', 'teknisis.teknisi', 'matkul', 'matkul.koor_matkul', 'matkul.jenis_matkul', 'ruangan', 'jam' => function ($query) {
            $query->orderBy('jam_awal', 'asc');
        }])
            ->where('tahun_ajaran', $tahunAjaranSelected)
            ->orderBy('hari', 'desc')->get();
        // dd($dataJadwal);
        $jam = Jam::all();
        $mataKuliah = Matkul::with('koor_matkul')->get();
        $dosen = Dosen::all();
        $teknisi = Teknisi::all();
        $ruangan = Ruangan::all();

        return view('admin.jadwal', compact('dataJadwal', 'jam', 'mataKuliah', 'dosen', 'teknisi', 'ruangan', 'tahunAjaran', 'tahunAjaranNow', 'tahunAjaranSelected'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingJadwal = Jadwal::with('dosens.dosen', 'teknisis.teknisi')
            ->where('hari', $request->hari)
            ->where('id_jam', $request->jam)
            ->where('id_ruangan', $request->ruangan)
            ->where('tahun_ajaran', $request->tahun_ajaran)
            ->where('id_matkul', $request->mata_kuliah)
            ->whereHas('dosens.dosen', function ($query) use ($request) {
                $query->whereIn('id', $request->dosen_pengampu);
            })
            ->whereHas('teknisis.teknisi', function ($query) use ($request) {
                $query->whereIn('id', $request->teknisi);
            })
            ->first();

        if ($existingJadwal) {
            return back()->withErrors(['message' => 'Jadwal yang sama sudah ada.']);
        }

        // Membuat instance Jadwal baru
        $jadwal = new Jadwal();

        // Menetapkan nilai atribut untuk jadwal
        $jadwal->id_matkul = $request->mata_kuliah;
        $jadwal->hari = $request->hari;
        $jadwal->id_jam = $request->jam;
        $jadwal->tahun_ajaran = $request->tahun_ajaran;
        $jadwal->id_ruangan = $request->ruangan;

        // Menyimpan data ke database
        $jadwal->save();


        foreach ($request->dosen_pengampu as $dosenId) {
            $jadwal->dosens()->create([
                'id_data_dosen' => $dosenId,
                'id_data_jadwal' => $jadwal->id
            ]);
        }

        foreach ($request->teknisi as $teknisiId) {
            $jadwal->teknisis()->create([
                'id_data_teknisi' => $teknisiId,
                'id_data_jadwal' => $jadwal->id
            ]);
        }

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
            ->where('id_ruangan', $request->ruangan)
            ->where('tahun_ajaran', $request->tahun_ajaran)
            ->where('id_matkul', $request->mata_kuliah)
            ->whereHas('dosens', function ($query) use ($request) {
                $query->whereIn('id_data_dosen', $request->dosen_pengampu);
            })
            ->whereHas('teknisis', function ($query) use ($request) {
                $query->whereIn('id_data_teknisi', $request->teknisi);
            })
            ->first();

        if ($existingJadwal) {
            return back()->withErrors(['message' => 'Jadwal yang sama sudah ada.']);
        }

        // Cari data jadwal berdasarkan ID
        $jadwal = Jadwal::find($id);

        // Menetapkan nilai atribut untuk jadwal
        $jadwal->id_matkul = $request->mata_kuliah;
        $jadwal->hari = $request->hari;
        $jadwal->id_jam = $request->jam;
        $jadwal->tahun_ajaran = $request->tahun_ajaran;
        $jadwal->id_ruangan = $request->ruangan;

        // Simpan perubahan
        $jadwal->save();

        $jadwal->dosens()->delete();

        foreach ($request->dosen_pengampu as $dosenId) {
            $jadwal->dosens()->create([
                'id_data_dosen' => $dosenId,
                'id_data_jadwal' => $jadwal->id
            ]);
        }

        $jadwal->teknisis()->delete();

        foreach ($request->teknisi as $teknisiId) {
            $jadwal->teknisis()->create([
                'id_data_teknisi' => $teknisiId,
                'id_data_jadwal' => $jadwal->id
            ]);
        }

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
        $jadwal->dosens()->delete();
        $jadwal->teknisis()->delete();

        return redirect()->route('adminJadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }
}
