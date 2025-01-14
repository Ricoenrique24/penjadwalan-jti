<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengurutkan data berdasarkan hari
        $dataJadwal = Jadwal::with(['dosens', 'kelas', 'teknisis', 'matkul', 'matkul.koor_matkul', 'matkul.jenis_matkul', 'ruangan', 'jam' => function ($query) {
            $query->orderBy('jam_awal', 'asc');
        }])->orderBy('hari', 'desc')->get();


        // dd($dataJadwal);

        return view('admin.dashboard', compact('dataJadwal'));
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
