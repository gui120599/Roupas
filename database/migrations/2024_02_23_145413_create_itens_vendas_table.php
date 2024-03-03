<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itens_vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_venda_produto_id');
            $table->unsignedBigInteger('item_venda_venda_id');
            $table->decimal('item_venda_quantidade',7,2)->default('0.00');
            $table->decimal('item_venda_preco_unitario',7,2)->default('0.00');
            $table->decimal('item_venda_preco_total',7,2)->default('0.00');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_venda_produto_id')->references('id')->on('produtos');
            $table->foreign('item_venda_venda_id')->references('id')->on('vendas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_vendas');
    }
};
