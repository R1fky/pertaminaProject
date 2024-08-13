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
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Event\ViewEvent;

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');

//proses login
Route::post('/login', [LoginController::class, 'loginproses']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::group(['middleware' => 'auth'], function () {
    // Routes that require authentication
    Route::get('/home', function () {
        $categorys = CategoryTugas::all();
        $pics = PicCategory::all();
        $bulans = Bulan::all();
        return view('homePage', [
            'title' => 'Home',
            'categorys' => CategoryTugas::all(),
            'pics' => PicCategory::all(),
            'bulans' => Bulan::all(),
            'title' => 'Home'
        ]);
    })->name('home');

    Route::get('/daftarkerja', [TugasController::class, 'tampil'])->name('daftarkerja');

    Route::get('/daftartugas/{bulan:nama_bulan}', [TugasController::class, 'show']);

    Route::post('/daftartugas/add', [TugasController::class, 'add'])->name('daftartugas.add');

    Route::get('/kategorikerja/{category:category_name}', function (CategoryTugas $category) {
        return view('kategoriKerja.katKerja', [
            'tugas' => $category->tugas,
            'category' => $category,
            'title' => 'Category Kerja'
        ]);
    });

    //form update tugas kerja
    Route::get('/updatetugas/{tugas:id}', function (Tugas $tugas) {
        return view('kategoriKerja.updateKerja', [
            'title' => 'Update Tugas Kerja',
            'tugas' => $tugas
        ]);
    });
    //update progres
    Route::post('/updateprogres/update/{tugas:id}',[TugasController::class, 'update']);
    //delete tugas
    Route::get('/daftartugas/delete/{tugas:id}', [TugasController::class, 'delete']);

    Route::post('/daftartugas/edit/{tugas:id}', [TugasController::class, 'edit']);

    Route::get('/daftartkjp', [TkjpController::class, 'show'])->name('daftartkjp');

    Route::post('/daftartkjp/add', [TkjpController::class, 'add'])->name('daftartkjp.add');

    Route::get('/daftartkjp/delete/{user:email}', [TkjpController::class, 'delete'])->name('daftartkjp.delete');

    Route::post('/daftartkjp/edit/{user:id}', [TkjpController::class, 'edit']);
});
