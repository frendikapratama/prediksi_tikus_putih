<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriSizeController;
use App\Http\Controllers\TikusController;
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

// Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::resource('tikus', TikusController::class);
// Route::resource('kategori', KategoriSizeController::class);
// Route::resource('jenis', JenisController::class);

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\TikusController;
// use App\Http\Controllers\KategoriSizeController;
// use App\Http\Controllers\JenisController;

// Routes untuk Login dan Logout (tanpa middleware)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::resource('tikus', TikusController::class);
    Route::resource('kategori', KategoriSizeController::class);
    Route::resource('jenis', JenisController::class);
});
