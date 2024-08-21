<?php

use App\Models\User;
use App\Models\Bulan;
use App\Models\Tugas;
use GuzzleHttp\Middleware;
use App\Models\PicCategory;
use App\Models\CategoryTugas;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\TkjpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TugasController;
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
        return view('homePage', [
            'title' => 'Home',
            'categorys' => CategoryTugas::all(),
            'pics' => PicCategory::all(),
            'bulans' => Bulan::all(),
            'title' => 'Home'
        ]);
    })->name('home');

    //profil
    Route::get('/profil', [TkjpController::class, 'profilShow']);
    //show form update profil
    Route::get('/updateProfil/{user:email}', [TkjpController::class, 'updateProfil']);
    //progress update profil
    Route::post('/updateEmail/{user:email}', [TkjpController::class, 'updateEmail']);
    Route::post('updatePassword/{user:email}', [TkjpController::class, 'updatePassword']);
    Route::post('/deleteAccount/{user:id}', [TkjpController::class, 'deleteAccount']);

    //daftar kerja atau tugas 
    Route::get('/daftarkerja', [TugasController::class, 'tampil'])->name('daftarkerja');

    Route::get('/daftartugas/{bulan:nama_bulan}', [TugasController::class, 'show']);

    Route::post('/daftartugas/add', [TugasController::class, 'add'])->name('daftartugas.add')->middleware('organik');

    Route::get('/kategorikerja/{category:category_name}', function (CategoryTugas $category) {
        return view('kategoriKerja.katKerja', [
            'tugas' => $category->tugas,
            'category' => $category,
            'title' => 'Category Kerja',
            'users' => User::all(),
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
    Route::post('/updateprogres/update/{tugas:id}', [TugasController::class, 'update']);

    //update progres terima belum sempurna
    Route::post('/updateprogres/terima/{tugas:id}', [TugasController::class, 'upTerima']);
    Route::post('/update/progressStatus/{tugas:id}', [TugasController::class, 'updateProgres']);
    //delete tugas
    Route::get('/daftartugas/delete/{tugas:id}', [TugasController::class, 'delete']);

    Route::post('/daftartugas/edit/{tugas:id}', [TugasController::class, 'edit']);

    //menampilkan kerja atau tugas berdasarkan status
    Route::get('daftartugas/status/progress', function () {
        return view('kategoriKerja.daftarKerjaProgress', [
            'title' => 'Status Kerja Progress',
            'tugass' => Tugas::all(),
        ]);
    });
    Route::get('daftartugas/status/approve', function () {
        return view('kategoriKerja.daftarKerjaApprove', [
            'title' => 'Status Kerja Aprove',
            'tugass' => Tugas::all(),
        ]);
    });
    Route::get('daftartugas/status/completed', function () {
        return view('kategoriKerja.daftarKerjaCompleted', [
            'title' => 'Status Kerja Compeleted',
        ]);
    });
    // end 

    //daftar pekerja atau tkjp
    Route::get('/daftartkjp', [TkjpController::class, 'show'])
        ->name('daftartkjp');

    Route::post('/daftartkjp/add', [TkjpController::class, 'add'])->name('daftartkjp.add');

    Route::get('/daftartkjp/delete/{user:email}', [TkjpController::class, 'delete'])->name('daftartkjp.delete');

    Route::post('/daftartkjp/edit/{user:id}', [TkjpController::class, 'edit']);
});
