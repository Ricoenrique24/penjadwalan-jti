<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganDosen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dosen.ruangan');
    }
}
