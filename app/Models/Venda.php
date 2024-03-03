<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'vendas';

    protected $fillable = [
        'venda_sessaocaixa_id',
        'venda_cliente_id',
        'venda_status',
        'venda_status_pagamento',
        'venda_descricao_pagamento',
        'venda_valor_dinheiro',
        'venda_valor_pix',
        'venda_valor_cartao_credito',
        'venda_valor_cartao_debito',
        'venda_quantidade_parcelas',
        'venda_valor_entrada',
        'venda_valor_parcelado',
        'venda_motivo_cancelamento',
    ];

    protected $casts = [
        'venda_valor_dinheiro' => 'decimal:2',
        'venda_valor_pix' => 'decimal:2',
        'venda_valor_cartao_credito' => 'decimal:2',
        'venda_valor_cartao_debito' => 'decimal:2',
        'venda_valor_entrada' => 'decimal:2',
        'venda_valor_parcelado' => 'decimal:2',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Relacionamento com a tabela 'sessao_caixas'
    public function sessaoCaixa()
    {
        return $this->belongsTo(SessaoCaixa::class, 'venda_sessaocaixa_id');
    }

    // Relacionamento com a tabela 'clientes'
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'venda_cliente_id');
    }
}
