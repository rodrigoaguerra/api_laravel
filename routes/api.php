<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CepController;

Route::get('/cep/{cep}', [CepController::class, 'index']);
Route::post('/cep', [CepController::class, 'store']);
Route::patch('/cep/{cep}', [CepController::class, 'update']);
Route::delete('/cep/{cep}', [CepController::class, 'destroy']);
Route::get('/cep/busca/{searchTerm}', [CepController::class, 'fuzzySearch']);

