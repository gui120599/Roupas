<?php

namespace App\Http\Controllers;

use App\Models\Caixa;
use App\Http\Requests\StoreCaixaRequest;
use App\Http\Requests\UpdateCaixaRequest;

class CaixaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Caixa $caixa)
    {
        $caixas = $caixa::all();
        return view('app.caixa.index',['caixas' => $caixas]);
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
    public function store(StoreCaixaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Caixa $caixa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caixa $caixa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaixaRequest $request, Caixa $caixa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caixa $caixa)
    {
        //
    }
}
