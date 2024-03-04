<?php
// OpcoesPagamentoController.php

namespace App\Http\Controllers;

use App\Models\OpcoesPagamento;
use App\Http\Requests\StoreOpcoesPagamentoRequest;
use App\Http\Requests\UpdateOpcoesPagamentoRequest;

class OpcoesPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(OpcoesPagamento $opcoesPagamento)
    {
        $opcoesPagamentos = $opcoesPagamento::all();
        return view('app.opcoes_pagamentos.index', compact('opcoesPagamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        return view('app.opcoes_pagamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(StoreOpcoesPagamentoRequest $request)
    {
        OpcoesPagamento::create([
            'opcaopag_nome' => $request->input('opcaopag_nome'),
            'opcaopag_tipo_taxa' => $request->input('opcaopag_tipo_taxa'),
            'opcaopag_valor_percentual_taxa' => $request->input('opcaopag_valor_percentual_taxa') ? str_replace(',', '.', $request->input('opcaopag_valor_percentual_taxa')) : '0.00',
        ]);

        return redirect()->route('opcoes_pagamentos')->with('success', 'Opção de Pagamento criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(OpcoesPagamento $opcaoPagamento)
    {
        return view('app.opcoes_pagamentos.show', ['opcaoPagamento' => $opcaoPagamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(OpcoesPagamento $opcoes_pagamentos)
    {
        return view('app.opcoes_pagamentos.edit',['opcaoPagamento' => $opcoes_pagamentos]);
    }

    /**
     * Update the specified resource in storage.
     * 
     */
    public function update(UpdateOpcoesPagamentoRequest $request, OpcoesPagamento $opcoesPagamento)
    {
        $opcoesPagamento->update($request->all());

        return redirect()->route('opcoes_pagamentos')->with('success', 'Opção de Pagamento atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpcoesPagamento  $opcoesPagamento
     * 
     */
    public function destroy(OpcoesPagamento $opcoesPagamento, $id)
    {
        $opcoesPagamento = OpcoesPagamento::find($id);

        if (!$opcoesPagamento) {
            return redirect('/OpcoesPagamentos')->with('error', 'Opção de Pagamento não encontrada!');
        }

        $opcoesPagamento->delete();

        return redirect('/OpcoesPagamentos')->with('success', 'Opção de Pagamento removida com sucesso');
    }

    /**
     * Show form for inactive OpcoesPagamento.
     *
     * 
     */
    public function inactive()
    {
        $opcoesPagamentosInativas = OpcoesPagamento::onlyTrashed()->get();

        return view('app.opcoes_pagamentos.inactive', ['opcoesPagamentos' => $opcoesPagamentosInativas]);
    }

    /**
     * Activate OpcoesPagamento.
     *
     * @param  \App\Models\OpcoesPagamento  $opcoesPagamento
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active(OpcoesPagamento $opcoesPagamento, $id)
    {
        $opcoesPagamento = OpcoesPagamento::withTrashed()->find($id);

        if (!$opcoesPagamento) {
            return redirect('/OpcoesPagamentos')->with('error', 'Opção de Pagamento não encontrada!');
        }

        $opcoesPagamento->restore();

        return redirect('/OpcoesPagamentos')->with('success', 'Opção de Pagamento ativada com sucesso');
    }
}
