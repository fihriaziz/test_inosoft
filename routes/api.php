<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function () {
});

Route::get('/stocks', [VehicleController::class, 'getStock']);

Route::post('/sale', [VehicleController::class, 'store']);

Route::get('/report/{id}', [ReportController::class, 'reportById']);
Route::get('/reports', [ReportController::class, 'reportAll']);

Route::post('/login', [AuthController::class, 'login']);
