<?php

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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'submit']);

Route::middleware(CheckIsLogin::class)->group(function () {
    Route::get('/', function () {
        return 'berhasil login';
    });
    Route::resource('/keadaan', KeadaanController::class)->names('keadaan');
});
