<?php

namespace App\Http\Controllers;

use App\Models\EntradaProduto;
use App\Http\Requests\StoreEntradaProdutoRequest;
use App\Http\Requests\UpdateEntradaProdutoRequest;
use App\Models\Categoria;
use App\Models\Produto;

class EntradaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        $produtos = Produto::all();
        return view('app.entrada_produto.index', ['categorias' => $categorias, 'produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntradaProdutoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EntradaProduto $entradaProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntradaProduto $entradaProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntradaProdutoRequest $request, EntradaProduto $entradaProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntradaProduto $entradaProduto)
    {
        //
    }

    /**
     * Busca produto pelo codigo
     */
    public function produtoSelecionado(Produto $produto, $id)
    {
        
    }

}
