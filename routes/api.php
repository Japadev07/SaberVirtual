<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\InscricaoController;

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

Route::middleware('auth:sanctum')->group(function () {
    
});

Route::apiResource('cursos', CursoController::class);
    Route::get('modulos/{curso}', [ModuloController::class, 'index']);
    Route::apiResource('modulos', ModuloController::class)->except(['index']);
    Route::get('aulas/{modulo}', [AulaController::class, 'index']);
    Route::apiResource('aulas', AulaController::class)->except(['index']);
    Route::get('inscricoes', [InscricaoController::class, 'index']);
    Route::post('inscricoes', [InscricaoController::class, 'store']);
    Route::delete('inscricoes/{id}', [InscricaoController::class, 'destroy']);