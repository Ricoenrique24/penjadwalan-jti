<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlotMatkulController extends Controller
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
            ->withCount('dosens as jumlah_dosen')
            ->withCount('teknisis as jumlah_teknisi')
            ->where('tahun_ajaran', $tahunAjaranSelected)
            ->orderBy('hari', 'desc')->get();

        // $jumlahDosenTerbanyak = $dataJadwal->max('jumlah_dosen');
        // $jumlahTeknisiTerbanyak = $dataJadwal->max('jumlah_teknisi');

        return view('admin.plotMatkul', compact('dataJadwal', 'tahunAjaran', 'tahunAjaranSelected'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
