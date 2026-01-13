<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduan;
use App\Http\Controllers\Masyarakat\PengaduanController as MasyarakatPengaduan;

Route::get('/', function () {
    return redirect()->route('masyarakat.index'); // halaman default masyarakat
});

// =====================
// ADMIN AUTH
// =====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =====================
Route::get('/password/reset', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// =====================
// ADMIN DASHBOARD (LOGIN WAJIB)
// =====================
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pengaduan', [AdminPengaduan::class, 'index'])->name('admin.pengaduan.index');
    Route::get('/pengaduan/{id}', [AdminPengaduan::class, 'show'])->name('admin.pengaduan.show');
    Route::post('/pengaduan/{id}/status', [AdminPengaduan::class, 'updateStatus'])->name('admin.pengaduan.updateStatus');
});

// =====================
// MASYARAKAT (TANPA LOGIN)
// =====================
// routes/web.php
Route::prefix('masyarakat')->group(function () {
    Route::get('/', [MasyarakatPengaduan::class, 'index'])->name('masyarakat.index');
    Route::get('/pengaduan/create', [MasyarakatPengaduan::class, 'create'])->name('masyarakat.pengaduan.create');
    Route::post('/pengaduan', [MasyarakatPengaduan::class, 'store'])->name('masyarakat.pengaduan.store');
    Route::get('/pengaduan/status', [MasyarakatPengaduan::class, 'status'])->name('masyarakat.pengaduan.status');
});
