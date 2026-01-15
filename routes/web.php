<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduan;
use App\Http\Controllers\Masyarakat\PengaduanController as MasyarakatPengaduan;
use App\Http\Controllers\Masyarakat\AuthController as MasyarakatAuth;

/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('masyarakat.index');
});

/*
|--------------------------------------------------------------------------
| AUTH ADMIN / UMUM
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/pengaduan', [AdminPengaduan::class, 'index'])
            ->name('admin.pengaduan.index');

        Route::get('/pengaduan/{id}', [AdminPengaduan::class, 'show'])
            ->name('admin.pengaduan.show');

        Route::patch('/pengaduan/{id}/status', [AdminPengaduan::class, 'updateStatus'])
            ->name('admin.pengaduan.updateStatus');
    });

/*
|--------------------------------------------------------------------------
| MASYARAKAT AREA
|--------------------------------------------------------------------------
*/
Route::prefix('masyarakat')->group(function () {

    // PUBLIK
    Route::get('/', [MasyarakatPengaduan::class, 'index'])
        ->name('masyarakat.index');

    Route::get('/pengaduan/create', [MasyarakatPengaduan::class, 'create'])
        ->name('masyarakat.pengaduan.create');

    Route::get('/pengaduan/status', [MasyarakatPengaduan::class, 'status'])
        ->name('masyarakat.pengaduan.status');

    // AUTH MASYARAKAT (modal POST)
    Route::post('/login', [MasyarakatAuth::class, 'loginProcess'])
        ->name('masyarakat.login.process');

    Route::post('/register', [MasyarakatAuth::class, 'registerProcess'])
        ->name('masyarakat.register.process');

    Route::post('/logout', [MasyarakatAuth::class, 'logout'])
        ->name('masyarakat.logout');
    Route::get('/pengaduan/{pengaduan}', [MasyarakatPengaduan::class, 'show'])
        ->name('masyarakat.pengaduan.show');
    // WAJIB LOGIN
    Route::middleware('auth:web')->group(function () {
        Route::post('/pengaduan', [MasyarakatPengaduan::class, 'store'])
            ->name('masyarakat.pengaduan.store');
    });
});
