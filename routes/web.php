<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Kriteria1Controller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Kriteria1Controller;
use App\Http\Controllers\Kriteria2Controller;
use App\Http\Controllers\Kriteria3Controller;
use App\Http\Controllers\Kriteria4Controller;
use App\Http\Controllers\Kriteria5Controller;
use App\Http\Controllers\Kriteria6Controller;
use App\Http\Controllers\Kriteria7Controller;
use App\Http\Controllers\Kriteria8Controller;
use App\Http\Controllers\Kriteria9Controller;

// Global pattern
Route::pattern('id', '[0-9]+');

// Route untuk halaman landing
Route::get('/landing', [LandingController::class, 'index'])->name('landing');

// Route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'postlogin']);
});

// Route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/', [WelcomeController::class, 'index']);

    // Kriteria 1 routes
    Route::prefix('kriteria1')->group(function () {
        Route::get('/', [Kriteria1Controller::class, 'index']);
        Route::post('/list', [Kriteria1Controller::class, 'list']);
        Route::get('/create', [Kriteria1Controller::class, 'create']);
        Route::post('/store', [Kriteria1Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria1Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria1Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria1Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria1Controller::class, 'destroy']);
        Route::get('/import', [Kriteria1Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria1Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria1Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria1Controller::class, 'export_pdf']);
    });

    // Kriteria 2 routes
    Route::prefix('kriteria2')->group(function () {
        Route::get('/', [Kriteria2Controller::class, 'index']);
        Route::post('/list', [Kriteria2Controller::class, 'list']);
        Route::get('/create', [Kriteria2Controller::class, 'create']);
        Route::post('/store', [Kriteria2Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria2Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria2Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria2Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria2Controller::class, 'destroy']);
        Route::get('/import', [Kriteria2Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria2Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria2Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria2Controller::class, 'export_pdf']);
    });

    // Kriteria 3 routes
    Route::prefix('kriteria3')->group(function () {
        Route::get('/', [Kriteria3Controller::class, 'index']);
        Route::post('/list', [Kriteria3Controller::class, 'list']);
        Route::get('/create', [Kriteria3Controller::class, 'create']);
        Route::post('/store', [Kriteria3Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria3Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria3Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria3Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria3Controller::class, 'destroy']);
        Route::get('/import', [Kriteria3Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria3Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria3Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria3Controller::class, 'export_pdf']);
    });

    // Kriteria 4 routes
    Route::prefix('kriteria4')->group(function () {
        Route::get('/', [Kriteria4Controller::class, 'index']);
        Route::post('/list', [Kriteria4Controller::class, 'list']);
        Route::get('/create', [Kriteria4Controller::class, 'create']);
        Route::post('/store', [Kriteria4Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria4Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria4Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria4Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria4Controller::class, 'destroy']);
        Route::get('/import', [Kriteria4Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria4Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria4Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria4Controller::class, 'export_pdf']);
    });

    // Kriteria 5 routes
    Route::prefix('kriteria5')->group(function () {
        Route::get('/', [Kriteria5Controller::class, 'index']);
        Route::post('/list', [Kriteria5Controller::class, 'list']);
        Route::get('/create', [Kriteria5Controller::class, 'create']);
        Route::post('/store', [Kriteria5Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria5Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria5Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria5Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria5Controller::class, 'destroy']);
        Route::get('/import', [Kriteria5Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria5Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria5Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria5Controller::class, 'export_pdf']);
    });

    // Kriteria 6 routes
    Route::prefix('kriteria6')->group(function () {
        Route::get('/', [Kriteria6Controller::class, 'index']);
        Route::post('/list', [Kriteria6Controller::class, 'list']);
        Route::get('/create', [Kriteria6Controller::class, 'create']);
        Route::post('/store', [Kriteria6Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria6Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria6Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria6Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria6Controller::class, 'destroy']);
        Route::get('/import', [Kriteria6Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria6Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria6Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria6Controller::class, 'export_pdf']);
    });

    // Kriteria 7 routes
    Route::prefix('kriteria7')->group(function () {
        Route::get('/', [Kriteria7Controller::class, 'index']);
        Route::post('/list', [Kriteria7Controller::class, 'list']);
        Route::get('/create', [Kriteria7Controller::class, 'create']);
        Route::post('/store', [Kriteria7Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria7Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria7Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria7Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria7Controller::class, 'destroy']);
        Route::get('/import', [Kriteria7Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria7Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria7Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria7Controller::class, 'export_pdf']);
    });

    // Kriteria 8 routes
    Route::prefix('kriteria8')->group(function () {
        Route::get('/', [Kriteria8Controller::class, 'index']);
        Route::post('/list', [Kriteria8Controller::class, 'list']);
        Route::get('/create', [Kriteria8Controller::class, 'create']);
        Route::post('/store', [Kriteria8Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria8Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria8Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria8Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria8Controller::class, 'destroy']);
        Route::get('/import', [Kriteria8Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria8Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria8Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria8Controller::class, 'export_pdf']);
    });

    // Kriteria 9 routes
    Route::prefix('kriteria9')->group(function () {
        Route::get('/', [Kriteria9Controller::class, 'index']);
        Route::post('/list', [Kriteria9Controller::class, 'list']);
        Route::get('/create', [Kriteria9Controller::class, 'create']);
        Route::post('/store', [Kriteria9Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria9Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria9Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria9Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria9Controller::class, 'destroy']);
        Route::get('/import', [Kriteria9Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria9Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria9Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria9Controller::class, 'export_pdf']);
    });

    // User routes (Admin mengelola user)
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/{id}/edit_ajax', [AdminController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [AdminController::class, 'update_ajax']);
        Route::get('/{id}/show_ajax', [AdminController::class, 'show_ajax']);
    });
});

// Route untuk ADMIN (auth + admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Manajemen akun pengguna
    Route::get('/akunpengguna', [AdminController::class, 'akunpengguna'])->name('admin.akunpengguna');
    Route::get('/akunpengguna/{id}/edit_ajax', [AdminController::class, 'edit_ajax'])->name('admin.edit_ajax');
    Route::put('/akunpengguna/{id}/update_ajax', [AdminController::class, 'update_ajax'])->name('admin.update_ajax');
    Route::get('/akunpengguna/{id}/detail_ajax', [AdminController::class, 'show_ajax'])->name('admin.show_ajax');

    // Data Dosen
    Route::get('/datadosen', [DosenController::class, 'index'])->name('admin.datadosen');
    Route::post('/datadosen/list', [DosenController::class, 'list'])->name('admin.datadosen.list');

    // Tambah jika kamu punya: create, edit, delete AJAX untuk dosen
    Route::get('/datadosen/create', [DosenController::class, 'create'])->name('admin.datadosen.create');
    Route::post('/datadosen/store', [DosenController::class, 'store'])->name('admin.datadosen.store');
    Route::get('/datadosen/{id}/edit_ajax', [DosenController::class, 'edit_ajax'])->name('admin.datadosen.edit_ajax');
    Route::put('/datadosen/{id}/update_ajax', [DosenController::class, 'update_ajax'])->name('admin.datadosen.update_ajax');
    Route::delete('/datadosen/{id}/delete_ajax', [DosenController::class, 'delete_ajax'])->name('admin.datadosen.delete_ajax');
});

// Login sbg dosen 
Route::prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/store', [DosenController::class, 'store'])->name('dosen.store');
    Route::post('/list', [DosenController::class, 'list']);
    Route::get('/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::get('/{id}/delete', [Kriteria9Controller::class, 'destroy']);
});
