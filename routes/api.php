<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MatriculaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('alumnos', AlumnoController::class);
Route::apiResource('cursos', CursoController::class);
Route::apiResource('profesores', ProfesorController::class);
Route::apiResource('horarios', HorarioController::class);
Route::apiResource('matriculas', MatriculaController::class);
