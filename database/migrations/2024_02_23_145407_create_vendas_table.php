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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venda_sessaocaixa_id');
            $table->unsignedBigInteger('venda_cliente_id')->default(null)->nullable();
            $table->enum('venda_status',['INICIADA','FINALIZADA'])->default('INICIADA');
            $table->enum('venda_status_pagamento',['RECEBIDO TOTAL','RECEBIDO PARCIAL','NÃO RECEBIDO'])->default('RECEBIDO TOTAL');
            $table->string('venda_descricao_pagamento');
            $table->decimal('venda_valor_dinheiro',7,2)->default('0.00')->nullable();
            $table->decimal('venda_valor_pix',7,2)->default('0.00')->nullable();
            $table->decimal('venda_valor_cartao_credito',7,2)->default('0.00')->nullable();
            $table->decimal('venda_valor_cartao_debito',7,2)->default('0.00')->nullable();
            $table->integer('venda_quantidade_parcelas')->nullable();
            $table->decimal('venda_valor_entrada',7,2)->default('0.00')->nullable();
            $table->decimal('venda_valor_parcelado',7,2)->default('0.00')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
