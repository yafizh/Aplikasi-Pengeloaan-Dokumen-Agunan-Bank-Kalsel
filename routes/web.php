<?php

use App\Http\Controllers\NasabahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('/nasabah', NasabahController::class);
