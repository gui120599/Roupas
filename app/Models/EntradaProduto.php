<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntradaProduto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'entrada_produtos';

    protected $fillable = [
        'entrada_produto_id',
        'entrada_quantidade',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
