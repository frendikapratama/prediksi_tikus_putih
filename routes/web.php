<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('tikus', TikusController::class);
Route::resource('kategori', KategoriSizeController::class);
Route::resource('jenis', JenisController::class);