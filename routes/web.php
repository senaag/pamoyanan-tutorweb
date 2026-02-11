<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
});


// Guest (Hanya yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'autentikasi']);
});

// Auth (Sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard Umum
    Route::get('/dashboardsiswa', function () {
        return "Halo " . auth()->user()->name . ", Anda login sebagai Siswa.";
    });

    // Dashboard Admin (Menggunakan Middleware CekPeran)
    Route::get('/admin', function () {
        return view('layout.master');
    })->middleware('cek_peran:admin,guru');

    Route::get('/guru', function () {
        return view('admin.guru');
    })->middleware('cek_peran:admin');

    Route::get('/siswa', function () {
        return view('admin.siswa');
    })->middleware('cek_peran:admin,guru');
});
