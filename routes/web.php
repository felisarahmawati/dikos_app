<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProdukDetailController;
use App\Http\Controllers\TampilanHomeController;
use App\Http\Controllers\TampilanAboutController;
use App\Http\Controllers\DaftarPenghuniController;

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

Auth::routes();

route::get('/', [LandingPageController::class, 'index'])->name('pengguna.layouts_user.content');

//Penghuni
Route::middleware(['auth', 'checkrole:0'])->group(function() {
    Route::get('/home', [HomeController::class, 'index']);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/produkdetail', ProdukDetailController::class);
    Route::resource('/history', HistoryController::class);
});

//Admin
Route::middleware(['auth', 'checkrole:1'])->group(function() {
    Route::prefix("admin")->group(function() {
        Route::prefix("layouts")->group(function() {
            Route::get('/dashboard', [MainController::class, 'index'])->name('admin.layouts.dashboard');
        });
        Route::prefix("landingpage")->group(function () {
            Route::prefix("home")->group(function () {
                Route::resource("/home", TampilanHomeController::class);
            });
            Route::prefix("about")->group(function () {
                Route::resource("/about", TampilanAboutController::class);
            });
        });
        Route::prefix("kamar")->group(function () {
            Route::resource("/tipekamar", TipeKamarController::class);
            Route::resource("/kamar", KamarController::class);
        });

        Route::prefix("datapenghuni")->group(function () {
            Route::resource("/penghuni", DaftarPenghuniController::class);
        });

        Route::prefix("pembayaran")->group(function () {
            Route::resource("/pembayaran", PembayaranController::class);
        });

        Route::prefix("laporan")->group(function () {
            Route::resource("/laporan", LaporanController::class);
        });
    });
});

