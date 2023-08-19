<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SalarioController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::apiResource('roles',RolController::class)->only('index');
    Route::apiResource('puestos',PuestoController::class)->only('index');
    Route::apiResource('salarios',SalarioController::class)->only('index');
    Route::apiResource('empleados',EmpleadoController::class)->only('index','store');
    Route::apiResource('asistencias',AsistenciaController::class)->only('index','store','destroy');
    Route::controller(UserController::class)->group(function () {
        Route::get('user-profile', 'userProfile');
        Route::post('logout',  'logout');
    });
});
Route::post('/login', [UserController::class, 'login']);
