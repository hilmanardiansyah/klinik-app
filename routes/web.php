<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware(['auth','role:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('wilayah', App\Http\Controllers\Admin\WilayahController::class);
    Route::resource('pegawai', App\Http\Controllers\Admin\PegawaiController::class);
    Route::resource('tindakan', App\Http\Controllers\Admin\TindakanController::class);
    Route::resource('obat', App\Http\Controllers\Admin\ObatController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::get('laporan/export', [App\Http\Controllers\Admin\LaporanController::class, 'exportPdf'])->name('laporan.export');
    Route::resource('laporan', App\Http\Controllers\Admin\LaporanController::class);
    
});

Route::middleware(['auth', 'role:petugas_pendaftaran'])->prefix('pendaftaran')->as('pendaftaran.')->group(function() {
    Route::get('dashboard', function () {
        return view('pendaftaran.dashboard');
    })->name('dashboard');
    Route::resource('pasien', App\Http\Controllers\Pendaftaran\PasienController::class);
    Route::resource('kunjungan', App\Http\Controllers\Pendaftaran\KunjunganController::class)
    ->except(['edit', 'update', 'show']);
});

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->as('dokter.')->group(function () {
    Route::get('dashboard', fn() => view('dokter.dashboard'))->name('dashboard');
    Route::resource('pemeriksaan', App\Http\Controllers\Dokter\PemeriksaanController::class)
        ->only(['index', 'edit', 'update']);
});

Route::middleware(['auth', 'role:kasir'])->prefix('kasir')->as('kasir.')->group(function () {
    Route::get('dashboard', fn() => view('kasir.dashboard'))->name('dashboard');
    Route::get('pembayaran', [App\Http\Controllers\Kasir\PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('pembayaran/{id}', [App\Http\Controllers\Kasir\PembayaranController::class, 'show'])->name('pembayaran.show');
    Route::post('pembayaran/{id}', [App\Http\Controllers\Kasir\PembayaranController::class, 'store'])->name('pembayaran.store');
});

require __DIR__.'/auth.php';
