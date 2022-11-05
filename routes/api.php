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

Route::middleware('jwt.verify')->group(function () {
    Route::get('/stocks', [VehicleController::class, 'stock'])->name('stock');

    Route::post('/sale', [VehicleController::class, 'store'])->name('sale');

    Route::get('/report/{id}', [ReportController::class, 'reportById'])->name('reportById');
    Route::get('/reports', [ReportController::class, 'reportAll'])->name('reports');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
