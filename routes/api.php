<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('produtos', [ProdutoController::class, 'store']);

Route::get('produtos', [ProdutoController::class, 'index']);

Route::put('produtos', [ProdutoController::class, 'update']);

Route::delete('produtos/{id}', [ProdutoController::class, 'delete']);

Route::get('produtos/{id}', [ProdutoController::class, 'show']);

Route::post('clientes', [ClienteController::class, 'store']);

Route::get('clientes', [ClienteController::class, 'index']);

Route::put('clientes', [ClienteController::class, 'update']);

Route::delete('cliente/{id}', [ClienteController::class, 'delete']);

Route::post('entradas', [EntradaController::class, 'store']);

Route::get('entradas', [EntradaController::class, 'index']);

Route::delete('entradas/{id}', [EntradaController::class, 'delete']);