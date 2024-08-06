<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TkjpController;
use App\Http\Controllers\TugasController;
use App\Models\CategoryTugas;
use App\Models\Tugas;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('homePage', [
        'categorys' => CategoryTugas::all()
    ]);
});

Route::get('/daftartugas', [TugasController::class, 'show'])->name('daftartugas');

//menambahkan daftar tugas
Route::post('/daftartugas/add', [TugasController::class, 'add'])->name('daftartugas.add');



//daftar kerja categori
// Route::get('/health', [TugasController::class, 'show']);

Route::get('/health{category:category_name}', function() {
    return view('daftartugas', [
        
    ]);
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
