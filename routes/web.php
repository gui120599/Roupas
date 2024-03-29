<?php

use App\Http\Controllers\CaixaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\OpcoesPagamentoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovimentacaoProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/Categoria', [CategoriaController::class, 'index'])->name('categoria');
    Route::get('/Categorias-Inativas', [CategoriaController::class, 'inactive'])->name('categoria.inactive');
    Route::post('/Categoria', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/Categoria/{categoria}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::get('/Categoria/{categoria}/Editar', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::patch('/Categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::get('/Ativar-Categoria/{id}', [CategoriaController::class, 'active'])->name('categoria.active');
    Route::delete('/Categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

    Route::get('/Produto', [ProdutoController::class, 'index'])->name('produto');
    Route::get('/Produtos-Inativos', [ProdutoController::class, 'inactive'])->name('produto.inactive');
    Route::post('/Produto', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('/Produto/{produto}', [ProdutoController::class, 'show'])->name('produto.show');
    Route::get('/Produto/{produto}/Editar', [ProdutoController::class, 'edit'])->name('produto.edit');
    Route::patch('/Produto/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::get('/Ativar-Produto/{id}', [ProdutoController::class, 'active'])->name('produto.active');
    Route::delete('/Produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
    
    Route::get('/Entrada-Produto', [MovimentacaoProdutoController::class, 'indexEntrada'])->name('entrada_produto');
    Route::post('/Entra-Produto', [MovimentacaoProdutoController::class, 'storeEntrada'])->name('mov_entrada.store');

    Route::get('/Cliente', [ClienteController::class, 'index'])->name('cliente');
    Route::get('/Clientes-Inativos', [ClienteController::class, 'inactive'])->name('cliente.inactive');
    Route::post('/Cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/Cliente/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
    Route::get('/Cliente/{cliente}/Editar', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::patch('/Cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::get('/Ativar-Cliente/{id}', [ClienteController::class, 'active'])->name('cliente.active');
    Route::delete('/Cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

    Route::get('/Caixa', [CaixaController::class, 'index'])->name('caixa');
    Route::get('/Caixas-Inativas', [CaixaController::class, 'inactive'])->name('caixa.inactive');
    Route::post('/Caixa', [CaixaController::class, 'store'])->name('caixa.store');
    Route::get('/Caixa/{caixa}', [CaixaController::class, 'show'])->name('caixa.show');
    Route::get('/Caixa/{caixa}/Editar', [CaixaController::class, 'edit'])->name('caixa.edit');
    Route::patch('/Caixa/{caixa}', [CaixaController::class, 'update'])->name('caixa.update');
    Route::get('/Ativar-Caixa/{id}', [CaixaController::class, 'active'])->name('caixa.active');
    Route::delete('/Caixa/{id}', [CaixaController::class, 'destroy'])->name('caixa.destroy');
    
    Route::get('/OpcoesPagamentos', [OpcoesPagamentoController::class, 'index'])->name('opcoes_pagamentos');
    Route::get('/OpcoesPagamentoss-Inativas', [OpcoesPagamentoController::class, 'inactive'])->name('opcoes_pagamentos.inactive');
    Route::post('/OpcoesPagamentos', [OpcoesPagamentoController::class, 'store'])->name('opcoes_pagamentos.store');
    Route::get('/OpcoesPagamentos/{opcoes_pagamentos}', [OpcoesPagamentoController::class, 'show'])->name('opcoes_pagamentos.show');
    Route::get('/OpcoesPagamentos/{opcoes_pagamentos}/Editar', [OpcoesPagamentoController::class, 'edit'])->name('opcoes_pagamentos.edit');
    Route::patch('/OpcoesPagamentos/{opcoes_pagamentos}', [OpcoesPagamentoController::class, 'update'])->name('opcoes_pagamentos.update');
    Route::get('/Ativar-OpcoesPagamentos/{id}', [OpcoesPagamentoController::class, 'active'])->name('opcoes_pagamentos.active');
    Route::delete('/OpcoesPagamentos/{id}', [OpcoesPagamentoController::class, 'destroy'])->name('opcoes_pagamentos.destroy');
});

require __DIR__ . '/auth.php';
