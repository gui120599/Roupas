<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EntradaProdutoController;
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
    
    Route::get('/Entrada-Produto', [EntradaProdutoController::class, 'index'])->name('entrada_produto');
    Route::get('/Produtos-Inativos', [EntradaProdutoController::class, 'inactive'])->name('entrada_produto.inactive');
    Route::post('/Entrada-Produto', [EntradaProdutoController::class, 'store'])->name('entrada_produto.store');
    Route::get('/Entrada-Produto/{entrada_produto}', [EntradaProdutoController::class, 'show'])->name('entrada_produto.show');
    Route::get('/Entrada-Produto/{entrada_produto}/Editar', [EntradaProdutoController::class, 'edit'])->name('entrada_produto.edit');
    Route::patch('/Entrada-Produto/{entrada_produto}', [EntradaProdutoController::class, 'update'])->name('entrada_produto.update');
    Route::get('/Ativar-Entrada-Produto/{id}', [EntradaProdutoController::class, 'active'])->name('entrada_produto.active');
    Route::delete('/Entrada-Produto/{id}', [EntradaProdutoController::class, 'destroy'])->name('entrada_produto.destroy');
});

require __DIR__ . '/auth.php';
