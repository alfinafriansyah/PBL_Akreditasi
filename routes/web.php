<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Kriteria1Controller;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Global pattern
Route::pattern('id', '[0-9]+');

// Guest routes (not logged in)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'postlogin']);
});

// Authenticated routes (everyone logged in)
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/', [WelcomeController::class, 'index']);

    // Kriteria1 routes for normal users
    Route::prefix('kriteria1')->group(function () {
        Route::get('/', [Kriteria1Controller::class, 'index']);
        Route::post('/list', [Kriteria1Controller::class, 'list']);
        Route::get('/create', [Kriteria1Controller::class, 'create']);
        Route::post('/store', [Kriteria1Controller::class, 'store']);

        // Ajax routes
        Route::get('/create_ajax', [Kriteria1Controller::class, 'create_ajax']);
        Route::post('/ajax', [Kriteria1Controller::class, 'store_ajax']);
        Route::get('/{id}', [Kriteria1Controller::class, 'show']);
        Route::get('/{id}/edit', [Kriteria1Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria1Controller::class, 'update']);
        Route::delete('/{id}', [Kriteria1Controller::class, 'destroy']);

        // Ajax update/delete
        Route::get('/{id}/edit_ajax', [Kriteria1Controller::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [Kriteria1Controller::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [Kriteria1Controller::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [Kriteria1Controller::class, 'delete_ajax']);

        // Import & Export
        Route::get('/import', [Kriteria1Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria1Controller::class, 'import_ajax']);
        Route::get('/export_excel', [Kriteria1Controller::class, 'export_excel']);
        Route::get('/export_pdf', [Kriteria1Controller::class, 'export_pdf']);
    });
});

// Admin routes — protect by auth + admin middleware (create this middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/akunpengguna', [AdminController::class, 'akunpengguna'])->name('admin.akunpengguna');
    Route::get('/admin/akunpengguna/{id}/detail_ajax', [AdminController::class, 'show_ajax'])->name('admin.show_ajax');
    Route::get('/admin/akunpengguna/{id}/edit_ajax', [AdminController::class, 'edit_ajax'])->name('admin.edit_ajax');

});

