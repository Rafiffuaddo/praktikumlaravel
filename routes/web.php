<?php

use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa/exportpdf', function () {
    return view('export.mahasiswapdf');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');
Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class , 'index'])->name('mahasiswa');
Route::post('/mahasiswa/create', [App\Http\Controllers\MahasiswaController::class , 'create'])->name('mahasiswa');
Route::get('/mahasiswa/{id}/edit', [App\Http\Controllers\MahasiswaController::class , 'edit'])->name('mahasiswa');
Route::post('/mahasiswa/{id}/update', [App\Http\Controllers\MahasiswaController::class , 'update'])->name('mahasiswa');
Route::get('/mahasiswa/delete/{id}', [App\Http\Controllers\MahasiswaController::class , 'delete'])->name('mahasiswa');
Route::get('/mahasiswa/exportpdf', [App\Http\Controllers\MahasiswaController::class , 'exportPDF'])->name('mahasiswa');