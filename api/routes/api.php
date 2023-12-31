<?php

use App\Http\Controllers\Api\AlumnoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);
Route::get('alumnos', [AlumnoController::class, 'list']);
Route::get('alumno', [AlumnoController::class, 'get']);
Route::post('alumno/crear', [AlumnoController::class, 'create']);
Route::post('alumno/borrar', [AlumnoController::class, 'delete']);
