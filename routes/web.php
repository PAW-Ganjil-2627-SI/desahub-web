<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo(); 
	  return "DB berhasil connect!";
    } catch (\Exception $e) {
        return 'DB gagal connect:' . $e->getMessage();
    }

})->withoutMiddleware('web'); 

Route::get('/', [PengaduanController::class, 'index'])->name('home');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/daftar-aduan', [PengaduanController::class, 'daftar'])->name('pengaduan.daftar');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/pengaduan/{pengaduan}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
    Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])->name('pengaduan.update');
    Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
});


