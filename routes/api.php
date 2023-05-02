<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\Api\KeadaanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/keadaan/detail', [KeadaanController::class, 'showDetailByJam']);
Route::get('/keadaan/latest', [KeadaanController::class, 'latest']);
Route::resource('/keadaan', KeadaanController::class);
Route::post('/chat', [AIController::class, 'send']);
