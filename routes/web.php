<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AuthController;


Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect!";
    } catch (\Exception $e){
        return "DB gagal connect: " . $e->getMessage();
    }
})->withoutMiddleware('web');

// Halaman publik (tanpa login)
Route::get('/', [PengaduanController::class, 'index'])->name('home');
Route::get('/daftar-aduan', [PengaduanController::class, 'daftar'])->name('pengaduan.daftar');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// Middleware "guest": hanya untuk user yang BELUM login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});

// Middleware "auth": hanya untuk user yang SUDAH login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Middleware "role": admin & petugas boleh mengubah pengaduan
    // Middleware "can": dicek lagi lewat PengaduanPolicy@update
    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/pengaduan/{pengaduan}/edit', [PengaduanController::class, 'edit'])
            ->name('pengaduan.edit')
            ->can('update', 'pengaduan');
        Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])
            ->name('pengaduan.update')
            ->can('update', 'pengaduan');
    });

    // Hanya admin yang boleh menghapus pengaduan (PengaduanPolicy@delete)
    Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])
        ->name('pengaduan.destroy')
        ->middleware('role:admin')
        ->can('delete', 'pengaduan');
});
