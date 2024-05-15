<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',                [DashboardController::class, 'index']);

    Route::get('/import',                    [HomeController::class, 'import']);
    Route::get('/import/kategori',           [HomeController::class, 'import_kategori']);

    // Route::group(['middleware' => ['permission:kelola_keuangan']], function () {
    Route::resource('/keuangan',            KeuanganController::class);
    // });

    Route::group(['middleware' => ['permission:kelola_kategori']], function () {
        Route::resource('/kategori',            KategoriController::class);
    });

    Route::group(['middleware' => ['permission:kelola_pengguna']], function () {
        Route::resource('/pengguna',            UserController::class);
    });

    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('/role',                RoleController::class);
        Route::resource('/permission',          PermissionController::class);
    });
});
