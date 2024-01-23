<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'produtos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'produto_descricao',
        'produto_codigo_barras',
        'produto_referencia',
        'produto_categoria_id',
        'produto_foto',
        'produto_preco_custo',
        'produto_valor_percentual_venda',
        'produto_preco_venda',
        'produto_valor_percentual_comissao',
        'produto_preco_comissao',
        'produto_preco_promocional',
        'produto_data_inicio_promocao',
        'produto_data_final_promocao',
        'produto_quantidade_minima',
        'produto_quantidade_maxima',
    ];

    // Relacionamento com a tabela 'categorias'
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'produto_categoria_id');
    }

    public function saveFoto($foto)
    {
        $nomeArquivo = time() . '.' . $foto->getClientOriginalExtension();
        $caminho = public_path('/img/fotos_produtos');
        $foto->move($caminho, $nomeArquivo);
        $this->produto_foto = $nomeArquivo;
        $this->save();
    }
}
