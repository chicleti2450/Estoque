<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('produtos', [ProdutoController::class, 'store']);

Route::get('produto', [ProdutoController::class, 'index']);

Route::put('produto', [ProdutoController::class, 'update']);

Route::delete('produto/{id}', [ProdutoController::class, 'delete']);

Route::get('produto/{id}', [ProdutoController::class, 'show']);
