<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::with('categorias')->get();
        return view('app.produto.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.produto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {

        $produto = Produto::create([
            'produto_descricao' => $request->input('produto_descricao'),
            'produto_codigo_barras' => $request->input('produto_codigo_barras'),
            'produto_referencia' => $request->input('produto_referencia'),
            'produto_categoria_id' => $request->input('produto_categoria_id'),
            'produto_preco_custo' => $request->input('produto_preco_custo') ? str_replace(',', '.', $request->input('produto_preco_custo')) : '0.00',
            'produto_valor_percentual_venda' => $request->input('produto_valor_percentual_venda') ? str_replace(',', '.', $request->input('produto_valor_percentual_venda')) : '0.00',
            'produto_preco_venda' => $request->input('produto_preco_venda') ? str_replace(',', '.', $request->input('produto_preco_venda')) : '0.00',
            'produto_valor_percentual_comissao' => $request->input('produto_valor_percentual_comissao') ? str_replace(',', '.', $request->input('produto_valor_percentual_comissao')) : '0.00',
            'produto_preco_comissao' => $request->input('produto_preco_comissao') ? str_replace(',', '.', $request->input('produto_preco_comissao')) : '0.00',
            'produto_preco_promocional' => $request->input('produto_preco_promocional') ? str_replace(',', '.', $request->input('produto_preco_promocional')) : '0.00',
            'produto_data_inicio_promocao' => $request->input('produto_data_inicio_promocao'),
            'produto_data_final_promocao' => $request->input('produto_data_final_promocao'),
            'produto_quantidade_minima' => $request->input('produto_quantidade_minima'),
            'produto_quantidade_maxima' => $request->input('produto_quantidade_maxima'),
        ]);
        
        // Upload da foto, se presente
        if ($request->hasFile('produto_foto')) {
            $foto = $request->file('produto_foto');
            $produto->saveFoto($foto);
        }


        $produto->save();

        // Redireciona para a página do produto recém-criado
        return redirect()->route('produto')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('app.produto.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        $produto->update([
            'produto_descricao' => $request->input('produto_descricao'),
            'produto_codigo_barras' => $request->input('produto_codigo_barras'),
            'produto_referencia' => $request->input('produto_referencia'),
            'produto_categoria_id' => $request->input('produto_categoria_id'),
            'produto_foto' => $request->input('produto_foto'),
            'produto_preco_custo' => $request->input('produto_preco_custo'),
            'produto_valor_percentual_venda' => $request->input('produto_valor_percentual_venda'),
            'produto_preco_venda' => $request->input('produto_preco_venda'),
            'produto_valor_percentual_comissao' => $request->input('produto_valor_percentual_comissao'),
            'produto_preco_comissao' => $request->input('produto_preco_comissao'),
            'produto_preco_promocional' => $request->input('produto_preco_promocional'),
            'produto_data_inicio_promocao' => $request->input('produto_data_inicio_promocao'),
            'produto_data_final_promocao' => $request->input('produto_data_final_promocao'),
            'produto_quantidade_minima' => $request->input('produto_quantidade_minima'),
            'produto_quantidade_maxima' => $request->input('produto_quantidade_maxima'),
        ]);

        // Redireciona para a página do produto recém-atualizado
        return redirect()->route('produto')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto, $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect('/Produto')->with('error', 'Produto não encontrado!');
        }

        $produto->delete();

        return redirect('/Produto')->with('success', 'Produto Inativado com sucesso!');
    }

    /**
     * Show form Inactives.
     */
    public function inactive()
    {
        $produtos_inativos = Produto::onlyTrashed()->get();

        return view('app.produto.inactive', ['produtos' => $produtos_inativos]);
    }

    /**
     * Active object.
     */
    public function active(Produto $produto, $id)
    {
        $produto = Produto::withTrashed()->find($id);

        if (!$produto) {
            return redirect('/Produto')->with('error', 'Produto não encontrado!');
        }

        $produto->restore();

        return redirect('/Produto')->with('success', 'Produto Ativado com sucesso!');
    }
}
