<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BerandaController;
use App\Http\Controllers\admin\DosenController;
use App\Http\Controllers\admin\JadwalController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\MatkulController;
use App\Http\Controllers\admin\PenggunaController;
use App\Http\Controllers\admin\RuanganController;
use App\Http\Controllers\admin\TeknisiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    // Route untuk halaman beranda
    Route::get('/beranda', [BerandaController::class, 'index'])->name('admin.beranda');

    // Route untuk autentikasi
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Route untuk data dosen
    Route::resource('dosen', DosenController::class);

    // Route untuk data jadwal
    Route::resource('jadwal', JadwalController::class);

    // Route untuk data kelas
    Route::resource('kelas', KelasController::class);

    // Route untuk data mata kuliah
    Route::resource('matkul', MatkulController::class);

    // Route untuk data pengguna
    Route::resource('pengguna', PenggunaController::class);

    // Route untuk data ruangan
    Route::resource('ruangan', RuanganController::class);

    // Route untuk data teknisi
    Route::resource('teknisi', TeknisiController::class);
});