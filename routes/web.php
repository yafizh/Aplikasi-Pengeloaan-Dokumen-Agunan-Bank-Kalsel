<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\DokumenAgunanController;
use App\Http\Controllers\DokumenAgunanPeminjamanController;
use App\Http\Controllers\LemariController;
use App\Http\Controllers\LemariDetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });


    Route::resource('/nasabah', NasabahController::class);
    Route::resource('/pegawai', PegawaiController::class);
    Route::resource('/lemari', LemariController::class);
    Route::resource('/lemari-detail', LemariDetailController::class);
    Route::resource('/dokumen-agunan', DokumenAgunanController::class);
    Route::resource('/dokumen-agunan-peminjaman', DokumenAgunanPeminjamanController::class);
    Route::controller(ReportController::class)
        ->prefix('laporan')
        ->group(function () {
            Route::get('/daftar-agunan', 'daftarAgunan');
            Route::get('/status-verifikasi', 'statusVerifikasi');
            Route::get('/masa-berlaku', 'masaBerlaku');
            Route::get('/peminjaman-pengembalian', 'peminjamanPengembalian');
            Route::get('/letak-dokumen-agunan', 'letakDokumenAgunan');
            Route::get('/ketersediaan-ruang-penyimpanan', 'ketersediaanRuangPenyimpanan');
        });
    Route::controller(CetakController::class)
        ->prefix('cetak')
        ->group(function () {
            Route::get('/daftar-agunan', 'daftarAgunan');
            Route::get('/status-verifikasi', 'statusVerifikasi');
            Route::get('/masa-berlaku', 'masaBerlaku');
            Route::get('/peminjaman-pengembalian', 'peminjamanPengembalian');
            Route::get('/letak-dokumen-agunan', 'letakDokumenAgunan');
            Route::get('/ketersediaan-ruang-penyimpanan', 'ketersediaanRuangPenyimpanan');
        });
});
