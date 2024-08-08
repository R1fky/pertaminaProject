<?php

use App\Models\Bulan;
use App\Models\Tugas;
use App\Models\CategoryTugas;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TkjpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TugasController;
use App\Models\PicCategory;

Route::get('/', function () {
    $categorys = CategoryTugas::all();
    $pics = PicCategory::all();
    $bulans = Bulan::all();
    return view('homePage', compact('categorys', 'bulans', 'pics'));
})->name('/');

//menampilkan seluruh daftar kerja 
Route::get('/daftarkerja', [TugasController::class, 'tampil'])->name('daftarkerja');

Route::get('/daftartugas/{bulan:nama_bulan}', [TugasController::class, 'show']);

//menambahkan daftar tugas
Route::post('/daftartugas/add', [TugasController::class, 'add'])->name('daftartugas.add');

//daftar tugas berdasarkan kategori
Route::get('/kategorikerja/{category:category_name}', function(CategoryTugas $category) {

    return view('kategoriKerja.katKerja',[
        'tugas' => $category->tugas,
        'category' => $category
    ]);
});

//mengahpus daftar tugas
Route::get('/daftartugas/delete/{tugas:id}', [TugasController::class, 'delete']);

//edit daftar tugas
Route::post('/daftartugas/edit/{tugas:id}', [TugasController::class, 'edit']);

Route::get('/daftartkjp', [TkjpController::class, 'show'])->name('daftartkjp');

// menambahkan data 
Route::post('/daftartkjp/add', [TkjpController::class, 'add'])->name('daftartkjp.add');
//menghapus data
Route::get('/daftartkjp/delete/{user:email}', [TkjpController::class, 'delete'])->name('daftartkjp.delete');
