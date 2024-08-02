<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TkjpController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('homePage');
});

Route::get('/health', function () {
    return view('kategoriKerja.health');
});
Route::get('/safety', function () {
    return view('kategoriKerja.safety');
});
Route::get('/security', function () {
    return view('kategoriKerja.security');
});
Route::get('/environment', function () {
    return view('kategoriKerja.environment');
});

Route::get('/daftartkjp', [TkjpController::class, 'show'])->name('daftartkjp');

// menambahkan data 
Route::post('/daftartkjp/add', [TkjpController::class, 'add'])->name('daftartkjp.add');

//menghapus data
Route::get('/daftartkjp/delete/{user:email}', [TkjpController::class, 'delete'])->name('daftartkjp.delete');
