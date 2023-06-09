<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeadaanController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckIsLogin;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'submit'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::middleware(CheckIsLogin::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/keadaan/detail/{waktu}', [KeadaanController::class, 'showDetailByJam'])->name('keadaan.detail');
    Route::resource('/keadaan', KeadaanController::class)->names('keadaan');
});
