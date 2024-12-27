<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\DifferentialFocusController;
use App\Http\Controllers\FormationOccupationsController;

// Rutas para crear
Route::post('/persons', [PersonController::class, 'store']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::post('/differential-focus', [DifferentialFocusController::class, 'store']);
Route::post('/formation-occupations', [FormationOccupationsController::class, 'store']);
Route::post('/emergency', [EmergencyController::class, 'store']);

// Rutas para listar todas las filas
Route::get('/persons', [PersonController::class, 'index']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/differential-focus', [DifferentialFocusController::class, 'index']);
Route::get('/formation-occupations', [FormationOccupationsController::class, 'index']);
Route::get('/emergency', [EmergencyController::class, 'index']);

// Rutas para mostrar un registro por ID
Route::get('/persons/{id}', [PersonController::class, 'show']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::get('/differential-focus/{id}', [DifferentialFocusController::class, 'show']);
Route::get('/formation-occupations/{id}', [FormationOccupationsController::class, 'show']);
Route::get('/emergency/{id}', [EmergencyController::class, 'show']);

// Rutas para actualizar un registro
Route::put('/persons/{id}', [PersonController::class, 'update']);
Route::put('/contacts/{id}', [ContactController::class, 'update']);
Route::put('/differential-focus/{id}', [DifferentialFocusController::class, 'update']);
Route::put('/formation-occupations/{id}', [FormationOccupationsController::class, 'update']);
Route::put('/emergency/{id}', [EmergencyController::class, 'update']);

// Rutas para eliminar un registro
Route::delete('/persons/{id}', [PersonController::class, 'destroy']);
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
Route::delete('/differential-focus/{id}', [DifferentialFocusController::class, 'destroy']);
Route::delete('/formation-occupations/{id}', [FormationOccupationsController::class, 'destroy']);
Route::delete('/emergency/{id}', [EmergencyController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
