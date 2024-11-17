<?php

use Illuminate\Support\Facades\Route;

// ADMIN
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\JamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\BerandaController;
use App\Http\Controllers\admin\DosenController;
use App\Http\Controllers\admin\JadwalController;
use App\Http\Controllers\admin\KelasController;
use App\Http\Controllers\admin\MatkulController;
use App\Http\Controllers\admin\PenggunaController;
use App\Http\Controllers\admin\RuanganController;
use App\Http\Controllers\admin\TeknisiController;

// DOSEN
use App\Http\Controllers\dosen\BebanDosen;
use App\Http\Controllers\dosen\DashboardDosen;
use App\Http\Controllers\dosen\JadwalDosen;
use App\Http\Controllers\dosen\RuanganDosen;

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
//ROUTER SLICING
// Route::get('/', function () {
//     return view('login');
// });
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/admin/dosen', [DosenController::class, 'index'])->name('adminDosen');
Route::post('/adminDosen', [DosenController::class, 'store'])->name('adminDosen.store');
Route::delete('/admin/dosen/{id_Dosen}', [DosenController::class, 'destroy'])->name('adminDosen.destroy');
Route::put('/Dosen/update/{id_Dosen}', [DosenController::class, 'update'])->name('adminDosen.update');

Route::get('/teknisi', [TeknisiController::class, 'index'])->name('adminTeknisi');
Route::post('/teknisi', [TeknisiController::class, 'store'])->name('adminTeknisi.store');
Route::get('/teknisi/{id}', [TeknisiController::class, 'show'])->name('adminTeknisi.show');
Route::put('/teknisi/{id}', [TeknisiController::class, 'update'])->name('adminTeknisi.update');
Route::delete('/teknisi/{id}', [TeknisiController::class, 'destroy'])->name('adminTeknisi.destroy');


Route::get('/admin/ruangan', function () {
    return view('admin.ruangan');
})->name('adminRuangan');

Route::get('/admin/kelas', function () {
    return view('admin.kelas');
})->name('kelas');

Route::get('/admin/mataKuliah', function () {
    return view('admin.mataKuliah');
})->name('mataKuliah');

Route::get('/admin/jam', function () {
    return view('admin.jam');
})->name('jam');

Route::get('/admin/jadwal', function () {
    return view('admin.jadwal');
})->name('jadwal');

Route::get('/admin/pengguna', function () {
    return view('admin.pengguna');
})->name('pengguna');

//ROUTE DOSEN DAN TEKNISI
Route::get('/dosen/dashboard', function () {
    return view('dosen.dashboard');
})->name('dosen-dashboard');
Route::get('/dosen/jadwal', function () {
    return view('dosen.jadwal');
})->name('dosen-jadwal');
Route::get('/dosen/beban', function () {
    return view('dosen.beban');
})->name('dosen-beban');
Route::get('/dosen/beban-pegawai', function () {
    return view('dosen.beban-pegawai');
})->name('dosen-beban-pegawai');

// Route untuk autentikasi
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    // Route untuk halaman beranda
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');

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
    Route::get('/dosen', [DosenController::class, 'index'])->name('adminDosen');
    Route::post('/dosen', [DosenController::class, 'store'])->name('adminDosen.store');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('adminDosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('adminDosen.destroy');

    // Route untuk data jadwal
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('adminJadwal');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('adminJadwal.store');
    Route::get('/jadwal/{id}', [JadwalController::class, 'show'])->name('adminJadwal.show');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('adminJadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('adminJadwal.destroy');

    // Route untuk data kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('adminKelas');
    Route::post('/kelas', [KelasController::class, 'store'])->name('adminKelas.store');
    Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('adminKelas.show');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('adminKelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('adminKelas.destroy');

    // Route untuk data mata kuliah
    Route::get('/matkul', [MatkulController::class, 'index'])->name('adminMataKuliah');
    Route::post('/matkul', [MatkulController::class, 'store'])->name('adminMataKuliah.store');
    Route::get('/matkul/{id}', [MatkulController::class, 'show'])->name('adminMataKuliah.show');
    Route::put('/matkul/{id}', [MatkulController::class, 'update'])->name('adminMataKuliah.update');
    Route::delete('/matkul/{id}', [MatkulController::class, 'destroy'])->name('adminMataKuliah.destroy');

    // Route untuk data pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('adminPengguna');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('adminPengguna.store');
    Route::get('/pengguna/{id}', [PenggunaController::class, 'show'])->name('adminPengguna.show');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('adminPengguna.update');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('adminPengguna.destroy');

    // Route untuk data ruangan
    Route::get('/ruangan', [RuanganController::class, 'index'])->name('adminRuangan');
    Route::post('/ruangan', [RuanganController::class, 'store'])->name('adminRuangan.store');
    Route::get('/ruangan/{id}', [RuanganController::class, 'show'])->name('adminRuangan.show');
    Route::put('/ruangan/{id}', [RuanganController::class, 'update'])->name('adminRuangan.update');
    Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy'])->name('adminRuangan.destroy');

    // Route untuk data teknisi
    Route::get('/teknisi', [TeknisiController::class, 'index'])->name('adminTeknisi');
    Route::post('/teknisi', [TeknisiController::class, 'store'])->name('adminTeknisi.store');
    Route::get('/teknisi/{id}', [TeknisiController::class, 'show'])->name('adminTeknisi.show');
    Route::put('/teknisi/{id}', [TeknisiController::class, 'update'])->name('adminTeknisi.update');
    Route::delete('/teknisi/{id}', [TeknisiController::class, 'destroy'])->name('adminTeknisi.destroy');

    // Route untuk data Jam Sesi
    Route::get('/jam', [JamController::class, 'index'])->name('adminJam');
    Route::post('/jam', [JamController::class, 'store'])->name('adminJam.store');
    Route::put('/jam/{id}', [JamController::class, 'update'])->name('adminJam.update');
    Route::delete('/jam/{id}', [JamController::class, 'destroy'])->name('adminJam.destroy');

});

Route::prefix('dosen')->group(function () {
    // Route untuk Dashboard Dosen
    Route::get('/dashboard', [DashboardDosen::class, 'index'])->name('dosenDashboard');

    // Route untuk Beban Dosen
    Route::get('/beban', [BebanDosen::class, 'index'])->name('dosenBeban');

    // Route untuk Jadwal Dosen
    Route::get('/jadwal', [JadwalDosen::class, 'index'])->name('dosenJadwal');
    
    // // Route untuk Ruangan Dosen
    // Route::get('/ruangan', [RuanganDosen::class, 'index'])->name('dosenRuangan');
});



