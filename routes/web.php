<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriSizeController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\TikusController;
use App\Http\Controllers\WeatherForecastController;
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
    Route::resource('pakan', PakanController::class);
    Route::resource('keuangan', KeuanganController::class);
    Route::get('/fetch-weather', [WeatherForecastController::class, 'fetchWeatherData'])->name('fetch-weather');
    Route::get('/cuaca', [WeatherForecastController::class, 'showWeatherPage'])->name('weather.index');


    Route::get('/add_user', [AuthController::class, 'add_user'])->name('add_user'); // Menampilkan formulir
    Route::post('/add-user', [AuthController::class, 'storeUser'])->name('storeUser'); // Menangani submit formulir
    Route::get('/settings', [AuthController::class, 'settings'])->name('settings');
    Route::put('/update-password', [AuthController::class, 'updatePassword'])->name('updatePassword');
    Route::get('/users', [AuthController::class, 'index'])->name('users');
});
