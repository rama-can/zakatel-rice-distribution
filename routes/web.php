<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

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
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/distribusi-beras', [FrontController::class, 'distribution'])->name('distribution');
Route::get('/laporan-beras', [FrontController::class, 'riceReport'])->name('rice.report');
Route::get('/export/laporan-beras-masuk', [FrontController::class, 'inRiceExport'])->name('in-rice.export');
Route::get('/export/laporan-beras-keluar', [FrontController::class, 'outRiceExport'])->name('out-rice.export');
Route::get('/{slug}', [FrontController::class, 'distributionBySlug'])->name('distribution.detail');
Route::get('/page/{slug}', [FrontController::class, 'pageBySlug'])->name('page.detail');

Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');

require __DIR__.'/auth.php';