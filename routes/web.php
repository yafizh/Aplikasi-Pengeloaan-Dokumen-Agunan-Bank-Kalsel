<?php

use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('/nasabah', NasabahController::class);
Route::resource('/pegawai', PegawaiController::class);
