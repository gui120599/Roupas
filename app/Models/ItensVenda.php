<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItensVenda extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'itens_vendas';

    protected $fillable = [
        'item_venda_produto_id',
        'item_venda_venda_id',
        'item_venda_quantidade',
        'item_venda_preco_unitario',
        'item_venda_preco_total',
    ];

    protected $casts = [
        'item_venda_quantidade' => 'decimal:2',
        'item_venda_preco_unitario' => 'decimal:2',
        'item_venda_preco_total' => 'decimal:2',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Relacionamento com a tabela 'produtos'
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'item_venda_produto_id');
    }

    // Relacionamento com a tabela 'vendas'
    public function venda()
    {
        return $this->belongsTo(Venda::class, 'item_venda_venda_id');
    }
}
