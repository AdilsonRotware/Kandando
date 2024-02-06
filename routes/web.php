<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProdutoController;

// Rotas de Autenticação
Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rotas para Cliente
Route::resource('clientes', ClienteController::class);

// Rotas para Compra
Route::resource('compras', CompraController::class);

// Rotas para Produto
Route::resource('produtos', ProdutoController::class);
