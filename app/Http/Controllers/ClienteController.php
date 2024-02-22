<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.cliente.index');
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
    public function store(StoreClienteRequest $request)
    {

        // Criar um novo cliente com base nos dados recebidos
        $cliente = new Cliente([
            'cliente_nome' => $request->input('cliente_nome'),
            'cliente_data_nascimento' => $request->input('cliente_data_nascimento'),
            'cliente_tipo' => $request->input('cliente_tipo'),
            'cliente_cpf' => $request->input('cliente_cpf'),
            'cliente_rg' => $request->input('cliente_rg'),
            'cliente_cnpj' => $request->input('cliente_cnpj'),
            'cliente_celular' => $request->input('cliente_celular'),
            'cliente_email' => $request->input('cliente_email'),
            'cliente_endereco' => $request->input('cliente_endereco'),
            'cliente_bairro' => $request->input('cliente_bairro'),
            'cliente_cidade' => $request->input('cliente_cidade'),
            'cliente_estado' => $request->input('cliente_estado'),
            'cliente_uf_estado' => $request->input('cliente_uf_estado'),
            'cliente_cep' => $request->input('cliente_cep'),
        ]);

        // Salvar a foto se presente
        if ($request->hasFile('cliente_foto')) {
            $foto = $request->file('cliente_foto');
            $cliente->saveFoto($foto);
        }

        // Salvar o cliente no banco de dados
        $cliente->save();

        // Redirecionar ou retornar a resposta desejada
        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
