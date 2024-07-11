<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MasterData\JabatanController;
use App\Http\Controllers\MasterData\KaryawanController;
use App\Http\Controllers\MasterData\UnitController;
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


// ################# Authentications Auth Access
Route::middleware(['auth'])->group(function () {

    Route::get('/filter', [DashboardController::class, 'filter'])->name('filter');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ################# Master Data Karyawan
    Route::get('/karyawan/data', [KaryawanController::class, 'getData'])->name('karyawan.data');
    Route::resource('/karyawan', KaryawanController::class)->except('show');


    // ################# Master Data Unit
    Route::get('/unit/data', [UnitController::class, 'getData'])->name('unit.data');
    Route::resource('/unit', UnitController::class)->except('show');

    // ################# Master Data Jabatan
    Route::get('/jabatan/data', [JabatanController::class, 'getData'])->name('jabatan.data');
    Route::resource('/jabatan', JabatanController::class)->except('show');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// ################# Authentications Guest Access
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
