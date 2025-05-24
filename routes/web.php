<?php

use App\Http\Controllers\Kriteria1Controller;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class,'index']);

Route::group(['prefix' => 'kriteria1'], function () {
    Route::get('/', [Kriteria1Controller::class, 'index']);
    Route::post('/list', [Kriteria1Controller::class, 'list']);
    Route::post('/', [Kriteria1Controller::class, 'store']);
    // Ajax
    Route::get('/create_ajax', [Kriteria1Controller::class, 'create_ajax']);
    Route::post('/ajax', [Kriteria1Controller::class, 'store_ajax']);
    Route::get('/{id}', [Kriteria1Controller::class, 'show']);
    Route::get('/{id}/edit', [Kriteria1Controller::class, 'edit']);
    Route::put('/{id}', [Kriteria1Controller::class, 'update']);
    Route::delete('/{id}', [Kriteria1Controller::class, 'destroy']);
    // Ajax Update
    Route::get('/{id}/edit_ajax', [Kriteria1Controller::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [Kriteria1Controller::class, 'update_ajax']);
    // Ajax Delete
    Route::get('/{id}/delete_ajax', [Kriteria1Controller::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [Kriteria1Controller::class, 'delete_ajax']);
    // Import Excel
    Route::get('/import', [Kriteria1Controller::class, 'import']);
    Route::post('/import_ajax', [Kriteria1Controller::class, 'import_ajax']);
    // Export Excel
    Route::get('/export_excel', [Kriteria1Controller::class, 'export_excel']);
    // Export PDF
    Route::get('/export_pdf', [Kriteria1Controller::class, 'export_pdf']);
});