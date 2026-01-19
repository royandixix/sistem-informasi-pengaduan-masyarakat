<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduan;
use App\Http\Controllers\Masyarakat\PengaduanController as MasyarakatPengaduan;
use App\Http\Controllers\Masyarakat\AuthController as MasyarakatAuth;
use App\Http\Controllers\Admin\KategoriPengaduanController;
use App\Http\Controllers\Admin\InstansiController;
use App\Http\Controllers\Admin\WilayahController;


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


        // INSTANSI CRUD
        Route::get('/instansi', [InstansiController::class, 'index'])->name('admin.instansi.index');
        Route::get('/instansi/create', [InstansiController::class, 'create'])->name('admin.instansi.create');
        Route::post('/instansi', [InstansiController::class, 'store'])->name('admin.instansi.store');
        Route::get('/instansi/{id}/edit', [InstansiController::class, 'edit'])->name('admin.instansi.edit');
        Route::put('/instansi/{id}', [InstansiController::class, 'update'])->name('admin.instansi.update');
        Route::delete('/instansi/{id}', [InstansiController::class, 'destroy'])->name('admin.instansi.destroy');


        // WILAYAH CRUD
        Route::get('/wilayah', [WilayahController::class, 'index'])->name('admin.wilayah.index');
        Route::get('/wilayah/create', [WilayahController::class, 'create'])->name('admin.wilayah.create');
        Route::post('/wilayah', [WilayahController::class, 'store'])->name('admin.wilayah.store');
        Route::get('/wilayah/{id}/edit', [WilayahController::class, 'edit'])->name('admin.wilayah.edit');
        Route::put('/wilayah/{id}', [WilayahController::class, 'update'])->name('admin.wilayah.update');
        Route::delete('/wilayah/{id}', [WilayahController::class, 'destroy'])->name('admin.wilayah.destroy');

        // =======================
        // KATEGORI PENGADUAN CRUD
        // =======================
        Route::get('/kategori', [KategoriPengaduanController::class, 'index'])
            ->name('admin.kategori.index');

        Route::get('/kategori/create', [KategoriPengaduanController::class, 'create'])
            ->name('admin.kategori.create');

        Route::post('/kategori', [KategoriPengaduanController::class, 'store'])
            ->name('admin.kategori.store');

        Route::get('/kategori/{id}/edit', [KategoriPengaduanController::class, 'edit'])
            ->name('admin.kategori.edit');

        Route::put('/kategori/{id}', [KategoriPengaduanController::class, 'update'])
            ->name('admin.kategori.update');

        Route::delete('/kategori/{id}', [KategoriPengaduanController::class, 'destroy'])
            ->name('admin.kategori.destroy');
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
