<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('panel-admin.dashboard.index');
})->middleware('auth');

// Route::get('/login', function (){
//     return view('auth.login');
// })->middleware('guest');



// ################# Master Data Karyawan
Route::get('/karyawan/data', [KaryawanController::class, 'getData'])->name('karyawan.data');
Route::resource('/karyawan', KaryawanController::class);

// ################# Master Data Unit
Route::get('/unit/data', [UnitController::class, 'getData'])->name('unit.data');
Route::resource('/unit', UnitController::class);

// ################# Master Data Jabatan
Route::get('/jabatan/data', [JabatanController::class, 'getData'])->name('jabatan.data');
Route::resource('/jabatan', JabatanController::class);



Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
