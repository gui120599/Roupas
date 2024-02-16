<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MovimentacaoProduto extends Model
{
    use HasFactory;

    protected $fillable = [
        'mov_produto_id',
        'mov_quantidade',
        'mov_tipo',
        'mov_motivo',
        'mov_venda_id',
        'mov_user_id',
    ];

    protected static function booted()
    {
        static::creating(function ($movimentacaoProduto) {
            $movimentacaoProduto->mov_user_id = Auth::id();
        });
    }
}
