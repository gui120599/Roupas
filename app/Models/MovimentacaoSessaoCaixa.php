<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MovimentacaoSessaoCaixa extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'movimentacao_sessao_caixas';

    protected $fillable = [
        'mov_sessaocaixa_sessao_id',
        'mov_caixa_tipo',
        'mov_sessaocaixa_motivo_saida',
        'mov_sessaocaixa_motivo_cancelamento',
        'mov_sessaocaixa_venda_id',
        'mov_sessaocaixa_valor',
        // 'mov_sessaocaixa_user_id', // Removido para ser definido automaticamente
    ];

    protected $casts = [
        'mov_sessaocaixa_valor' => 'decimal:2',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Relacionamento com a tabela 'sessao_caixas'
    public function sessaoCaixa()
    {
        return $this->belongsTo(SessaoCaixa::class, 'mov_sessaocaixa_sessao_id');
    }

    // Relacionamento com a tabela 'vendas'
    public function venda()
    {
        return $this->belongsTo(Venda::class, 'mov_sessaocaixa_venda_id');
    }

    // Relacionamento com a tabela 'users'
    public function user()
    {
        return $this->belongsTo(User::class, 'mov_sessaocaixa_user_id');
    }

    // Método para definir automaticamente o user_id ao criar uma nova instância
    public static function boot()
    {
        parent::boot();

        static::creating(function ($movimentacaoSessaoCaixa) {
            $movimentacaoSessaoCaixa->mov_sessaocaixa_user_id = Auth::id();
        });
    }
}
