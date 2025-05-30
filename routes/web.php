<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Kriteria1Controller;

// Global pattern
Route::pattern('id', '[0-9]+');

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
        Route::get('/{id}/delete', [Kriteria1Controller::class, 'destroy']);
        Route::get('/import', [Kriteria1Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria1Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria1Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria1Controller::class, 'export_pdf']);
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
    Route::get('/akunpengguna/{id}/detail_ajax', [AdminController::class, 'show_ajax'])->name('admin.show_ajax');
    Route::get('/akunpengguna/{id}/edit_ajax', [AdminController::class, 'edit_ajax'])->name('admin.edit_ajax');

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
