<?php

use App\Http\Controllers\Admin\Auth\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPemesananController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UsersAuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PemesananController;
use App\Models\Menu;
use App\Http\Controllers\SessionController;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/handleInput', [DashboardController::class, 'handleInput'])->name('dashboard.handleInput');

    Route::controller(UsersController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('users');
        Route::get('tambah', 'tambah')->name('users.tambah');
        Route::post('tambah', 'simpan')->name('users.tambah.simpan');
        Route::post('tambah', 'store')->name('users.tambah.store');
        Route::get('edit/{id}', 'edit')->name('users.edit');
        Route::post('edit/{id}', 'update')->name('users.edit.store');
        Route::get('hapus/{id}', 'hapus')->name('users.hapus');
    });

    Route::prefix('menu')->group(function () {
        Route::get('', [MenuController::class, 'index'])->name('menu');
        Route::get('tambah', [MenuController::class, 'tambah'])->name('menu.tambah');
        Route::post('tambah', [MenuController::class, 'simpan'])->name('menu.tambah.simpan');
        Route::get('edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::post('edit/{id}', [MenuController::class, 'update'])->name('menu.edit.store');
        Route::get('hapus/{id}', [MenuController::class, 'hapus'])->name('menu.hapus');
    });

    Route::controller(PemesananController::class)->prefix('pemesanan')->group(function () {
        Route::get('', 'index')->name('pemesanan');
        Route::get('tambah', [PemesananController::class, 'tambah'])->name('pemesanan.tambah');
        Route::post('tambah', [PemesananController::class, 'simpan'])->name('pemesanan.tambah.simpan');
        Route::get('edit/{id}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
        Route::post('edit/{id}', [PemesananController::class, 'update'])->name('pemesanan.edit.store');
        Route::get('hapus/{id}', [PemesananController::class, 'hapus'])->name('pemesanan.hapus');
    });

    Route::controller(DetailPemesananController::class)->prefix('order')->group(function () {
        Route::get('', [DetailPemesananController::class, 'index'])->name('order');
        Route::get('/detail/{id}', [DetailPemesananController::class, 'detail'])->name('order_detail');
        Route::get('/konfirmasi/{id}', [DetailPemesananController::class, 'confirm'])->name('konfirmasi_order');
    });
});

Route::get('/sesi', [SessionController::class, 'index'])->name('sesi');
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('sesi.logout');
Route::get('/sesi/login', [SessionController::class, 'login'])->name('sesi.login');