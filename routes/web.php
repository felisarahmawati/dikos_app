<?php

use App\Http\Controllers\DaftarPenghuniController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\TampilanHomeController;
use App\Http\Controllers\TampilanAboutController;

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

// Route::get('/', function () {
//     return view('pengguna.landingpage.home');
// });

Route::get('/login', function () {
    return view('autentikasi.login');
});

route::get('/', [HomeController::class, 'index'])->name('pengguna.layouts_user.content');

//admin
route::get('/dashboard', [MainController::class, 'index'])->name('admin.layouts.main');

Route::prefix("admin")->group(function () {
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
