<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TkjpController;
use App\Http\Controllers\TugasController;
use App\Models\CategoryTugas;
use App\Models\Tugas;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $categorys = CategoryTugas::all();
    return view('homePage', compact('categorys'));
});

Route::get('/daftartugas', [TugasController::class, 'show'])->name('daftartugas');

//menambahkan daftar tugas
Route::post('/daftartugas/add', [TugasController::class, 'add'])->name('daftartugas.add');

//daftar tugas berdasarkan kategori
Route::get('/kategorikerja/{category:category_name}', function(CategoryTugas $category) {

    return view('kategoriKerja.katKerja',[
        'tugas' => $category->tugas,
        'category' => $category
    ]);
});

// Route::get('/katKerja/{category:id}', function(CategoryTugas $category) {

//     return view('kategoriKerja.katKerja',[
//         'tugas' => $category->tugas,
//         'category' => $category
//     ]);
// });

Route::get('/daftartkjp', [TkjpController::class, 'show'])->name('daftartkjp');

// menambahkan data 
Route::post('/daftartkjp/add', [TkjpController::class, 'add'])->name('daftartkjp.add');
//menghapus data
Route::get('/daftartkjp/delete/{user:email}', [TkjpController::class, 'delete'])->name('daftartkjp.delete');
