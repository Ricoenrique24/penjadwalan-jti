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

     // Route untuk halaman beranda
    Route::get('/beranda', [BerandaController::class, 'index'])->name('admin.beranda');

    // Route untuk autentikasi
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Route untuk data dosen
    Route::get('/dosen', [DosenController::class, 'index'])->name('admin.dosen.index');
    Route::post('/dosen', [DosenController::class, 'store'])->name('admin.dosen.store');
    Route::get('/dosen/{id}', [DosenController::class, 'show'])->name('admin.dosen.show');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('admin.dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('admin.dosen.destroy');

    // Route untuk data jadwal
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('admin.jadwal.index');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('admin.jadwal.store');
    Route::get('/jadwal/{id}', [JadwalController::class, 'show'])->name('admin.jadwal.show');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');

    // Route untuk data kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('admin.kelas.index');
    Route::post('/kelas', [KelasController::class, 'store'])->name('admin.kelas.store');
    Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('admin.kelas.show');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('admin.kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('admin.kelas.destroy');

    // Route untuk data mata kuliah
    Route::get('/matkul', [MatkulController::class, 'index'])->name('admin.matkul.index');
    Route::post('/matkul', [MatkulController::class, 'store'])->name('admin.matkul.store');
    Route::get('/matkul/{id}', [MatkulController::class, 'show'])->name('admin.matkul.show');
    Route::put('/matkul/{id}', [MatkulController::class, 'update'])->name('admin.matkul.update');
    Route::delete('/matkul/{id}', [MatkulController::class, 'destroy'])->name('admin.matkul.destroy');

    // Route untuk data pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
    Route::get('/pengguna/{id}', [PenggunaController::class, 'show'])->name('admin.pengguna.show');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');

    // Route untuk data ruangan
    Route::get('/ruangan', [RuanganController::class, 'index'])->name('admin.ruangan.index');
    Route::post('/ruangan', [RuanganController::class, 'store'])->name('admin.ruangan.store');
    Route::get('/ruangan/{id}', [RuanganController::class, 'show'])->name('admin.ruangan.show');
    Route::put('/ruangan/{id}', [RuanganController::class, 'update'])->name('admin.ruangan.update');
    Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy'])->name('admin.ruangan.destroy');

    // Route untuk data teknisi
    Route::get('/teknisi', [TeknisiController::class, 'index'])->name('admin.teknisi.index');
    Route::post('/teknisi', [TeknisiController::class, 'store'])->name('admin.teknisi.store');
    Route::get('/teknisi/{id}', [TeknisiController::class, 'show'])->name('admin.teknisi.show');
    Route::put('/teknisi/{id}', [TeknisiController::class, 'update'])->name('admin.teknisi.update');
    Route::delete('/teknisi/{id}', [TeknisiController::class, 'destroy'])->name('admin.teknisi.destroy');

    // // Route untuk data dosen
    // Route::resource('dosen', DosenController::class);

    // // Route untuk data jadwal
    // Route::resource('jadwal', JadwalController::class);

    // // Route untuk data kelas
    // Route::resource('kelas', KelasController::class);

    // // Route untuk data mata kuliah
    // Route::resource('matkul', MatkulController::class);

    // // Route untuk data pengguna
    // Route::resource('pengguna', PenggunaController::class);

    // // Route untuk data ruangan
    // Route::resource('ruangan', RuanganController::class);

    // // Route untuk data teknisi
    // Route::resource('teknisi', TeknisiController::class);
});