<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ValidasiController;

// Global pattern
Route::pattern('id', '[0-9]+');

// Route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    // Route untuk halaman landing
    Route::get('landing', [LandingController::class, 'index'])->name('landing');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'Postlogin']);
});

// Redirect dashboard berdasarkan role user
Route::get('/', function () {
    $roleKode = Auth::user()->role->role_kode ?? null;

    if (in_array($roleKode, ['KRT1','KRT2','KRT3','KRT4','KRT5','KRT6','KRT7','KRT8','KRT9'])) {
        return redirect('/kriteria/dashboard');
    }
    if ($roleKode == 'KOOR') {
        return redirect('/koordinator/dashboard');
    }
    if ($roleKode == 'KPSKAJUR') {
        return redirect('/kpskajur/dashboard');
    }
    if ($roleKode == 'KJM') {
        return redirect('/kjm/dashboard');
    }
    if ($roleKode == 'DIR') {
        return redirect('/direktur/dashboard');
    }
    if ($roleKode == 'ADM') {
        return redirect('/admin/dashboard');
    }
    // Default jika role tidak dikenali
    return redirect('/landing');
});

// Route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/kriteria/dashboard', [WelcomeController::class, 'index'])->middleware('role:KRT1,KRT2,KRT3,KRT4,KRT5,KRT6,KRT7,KRT8,KRT9');
    Route::get('/koordinator/dashboard', [WelcomeController::class, 'koordinator'])->middleware('role:KOOR');
    Route::get('/kpskajur/dashboard', [WelcomeController::class, 'kpskajur'])->middleware('role:KPSKAJUR');
    Route::get('/kjm/dashboard', [WelcomeController::class, 'kjm'])->middleware('role:KJM');
    Route::get('/direktur/dashboard', [WelcomeController::class, 'direktur'])->middleware('role:DIR');

    // Kriteria 1 routes
    Route::prefix('kriteria1')->middleware('role:KRT1')->group(function () {
        Route::get('/', [Kriteria1Controller::class, 'index']);
        Route::post('/list', [Kriteria1Controller::class, 'list']);
        Route::get('/create', [Kriteria1Controller::class, 'create']);
        Route::post('/store', [Kriteria1Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria1Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria1Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria1Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria1Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria1Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria1Controller::class, 'listEvaluasi']);

    });

    // Kriteria 2 routes
    Route::prefix('kriteria2')->middleware('role:KRT2')->group(function () {
        Route::get('/', [Kriteria2Controller::class, 'index']);
        Route::post('/list', [Kriteria2Controller::class, 'list']);
        Route::get('/create', [Kriteria2Controller::class, 'create']);
        Route::post('/store', [Kriteria2Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria2Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria2Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria2Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria2Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria2Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria2Controller::class, 'listEvaluasi']);
    });

    // Kriteria 3 routes
    Route::prefix('kriteria3')->middleware('role:KRT3')->group(function () {
        Route::get('/', [Kriteria3Controller::class, 'index']);
        Route::post('/list', [Kriteria3Controller::class, 'list']);
        Route::get('/create', [Kriteria3Controller::class, 'create']);
        Route::post('/store', [Kriteria3Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria3Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria3Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria3Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria3Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria3Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria3Controller::class, 'listEvaluasi']);
    });

    // Kriteria 4 routes
    Route::prefix('kriteria4')->middleware('role:KRT4')->group(function () {
        Route::get('/', [Kriteria4Controller::class, 'index']);
        Route::post('/list', [Kriteria4Controller::class, 'list']);
        Route::get('/create', [Kriteria4Controller::class, 'create']);
        Route::post('/store', [Kriteria4Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria4Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria4Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria4Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria4Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria4Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria4Controller::class, 'listEvaluasi']);
    });

    // Kriteria 5 routes
    Route::prefix('kriteria5')->middleware('role:KRT5')->group(function () {
        Route::get('/', [Kriteria5Controller::class, 'index']);
        Route::post('/list', [Kriteria5Controller::class, 'list']);
        Route::get('/create', [Kriteria5Controller::class, 'create']);
        Route::post('/store', [Kriteria5Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria5Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria5Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria5Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria5Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria5Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria5Controller::class, 'listEvaluasi']);
    });

    // Kriteria 6 routes
    Route::prefix('kriteria6')->middleware('role:KRT6')->group(function () {
        Route::get('/', [Kriteria6Controller::class, 'index']);
        Route::post('/list', [Kriteria6Controller::class, 'list']);
        Route::get('/create', [Kriteria6Controller::class, 'create']);
        Route::post('/store', [Kriteria6Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria6Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria6Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria6Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria6Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria6Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria6Controller::class, 'listEvaluasi']);
    });

    // Kriteria 7 routes
    Route::prefix('kriteria7')->middleware('role:KRT7')->group(function () {
        Route::get('/', [Kriteria7Controller::class, 'index']);
        Route::post('/list', [Kriteria7Controller::class, 'list']);
        Route::get('/create', [Kriteria7Controller::class, 'create']);
        Route::post('/store', [Kriteria7Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria7Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria7Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria7Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria7Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria7Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria7Controller::class, 'listEvaluasi']);
    });

    // Kriteria 8 routes
    Route::prefix('kriteria8')->middleware('role:KRT8')->group(function () {
        Route::get('/', [Kriteria8Controller::class, 'index']);
        Route::post('/list', [Kriteria8Controller::class, 'list']);
        Route::get('/create', [Kriteria8Controller::class, 'create']);
        Route::post('/store', [Kriteria8Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria8Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria8Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria8Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria8Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria8Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria8Controller::class, 'listEvaluasi']);
    });

    // Kriteria 9 routes
    Route::prefix('kriteria9')->middleware('role:KRT9')->group(function () {
        Route::get('/', [Kriteria9Controller::class, 'index']);
        Route::post('/list', [Kriteria9Controller::class, 'list']);
        Route::get('/create', [Kriteria9Controller::class, 'create']);
        Route::post('/store', [Kriteria9Controller::class, 'store']);
        Route::get('/{id}/detail', [Kriteria9Controller::class, 'detail']);
        Route::get('/{id}/edit', [Kriteria9Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria9Controller::class, 'update']);
        Route::get('/{id}/delete', [Kriteria9Controller::class, 'destroy']);
        Route::get('/notifikasi', [Kriteria9Controller::class, 'indexEvaluasi']);
        Route::post('/evaluasi', [Kriteria9Controller::class, 'listEvaluasi']);
    });

    // Route untuk validasi
    Route::prefix('validasi')->middleware('role:KOOR,KPSKAJUR,KJM,DIR')->group(function () {
        // List Kriteria
        Route::post('list', [ValidasiController::class, 'list']);
        // Tambah komentar
        Route::put('/{id}/komentar', [ValidasiController::class, 'addKomentar']);
        // Export PDF
        Route::get('/{id}/export', [ValidasiController::class, 'export_pdf']);
    });

    // Validasi Koordinator (hanya role KOORDINATOR)
    Route::prefix('validasi/koordinator')->middleware('role:KOOR')->group(function () {
        Route::get('/', [ValidasiController::class, 'koordinator'])->name('validasi.koordinator');
        Route::get('/{id}/form', [ValidasiController::class, 'koordinator_form']);
        Route::get('/{id}/validate', [ValidasiController::class, 'koordinator_validate']);
    });

    // Validasi KPS/Kajur (hanya role KPSKAJUR)
    Route::prefix('validasi/kpskajur')->middleware('role:KPSKAJUR')->group(function () {
        Route::get('/', [ValidasiController::class, 'kpskajur'])->name('validasi.kpskajur');
        Route::get('/{id}/form', [ValidasiController::class, 'kpskajur_form']);
        Route::get('/{id}/validate', [ValidasiController::class, 'kpskajur_validate']);
    });

    // Validasi KJM (hanya role KJM)
    Route::prefix('validasi/kjm')->middleware('role:KJM')->group(function () {
        Route::get('/', [ValidasiController::class, 'kjm'])->name('validasi.kjm');
        Route::get('/{id}/form', [ValidasiController::class, 'kjm_form']);
        Route::get('/{id}/validate', [ValidasiController::class, 'kjm_validate']);
    });

    // Validasi Direktur (hanya role DIREKTUR)
    Route::prefix('validasi/direktur')->middleware('role:DIR')->group(function () {
        Route::get('/', [ValidasiController::class, 'direktur'])->name('validasi.direktur');
        Route::get('/{id}/form', [ValidasiController::class, 'direktur_form']);
        Route::get('/{id}/validate', [ValidasiController::class, 'direktur_validate']);
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
    Route::get('/datadosen', [DosenController::class, 'index'])->name('admin.datadosen');
    Route::post('/datadosen/list', [DosenController::class, 'list'])->name('admin.datadosen.list');
    Route::get('/datadosen/create', [DosenController::class, 'create'])->name('admin.datadosen.create');
    Route::post('/datadosen/store', [DosenController::class, 'store'])->name('admin.datadosen.store');
    Route::get('/datadosen/{id}/edit', [DosenController::class, 'edit'])->name('admin.datadosen.edit');
    Route::put('/datadosen/{id}/update_ajax', [DosenController::class, 'update_ajax'])->name('admin.datadosen.update_ajax');
    Route::delete('/datadosen/{id}/delete_ajax', [DosenController::class, 'delete_ajax'])->name('admin.datadosen.delete_ajax');
    Route::get('/datadosen/import', [DosenController::class, 'import'])->name('admin.datadosen.import');
    Route::post('/datadosen/import_ajax', [DosenController::class, 'import_ajax'])->name('admin.datadosen.import_ajax');


});

//// Login sbg dosen
//Route::prefix('dosen')->group(function () {
//    Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
//    Route::get('/create', [DosenController::class, 'create'])->name('dosen.create');
//    Route::post('/store', [DosenController::class, 'store'])->name('dosen.store');
//    Route::post('/list', [DosenController::class, 'list']);
//    Route::get('/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
//    Route::put('/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
//    Route::get('/{id}/delete', [Kriteria9Controller::class, 'destroy']);
//});
