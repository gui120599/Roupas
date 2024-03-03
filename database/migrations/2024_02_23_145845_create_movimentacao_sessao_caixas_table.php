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
        Schema::create('movimentacao_sessao_caixas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mov_sessaocaixa_sessao_id');
            $table->enum('mov_caixa_tipo',['ENTRADA','SAIDA','CANCELADA'])->default('ENTRADA');
            $table->text('mov_sessaocaixa_motivo_saida')->default(null)->nullable();
            $table->text('mov_sessaocaixa_motivo_cancelamento')->default(null)->nullable();
            $table->unsignedBigInteger('mov_sessaocaixa_venda_id')->nullable();
            $table->decimal('mov_sessaocaixa_valor',7,2)->default('0.00');
            $table->unsignedBigInteger('mov_sessaocaixa_user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mov_sessaocaixa_sessao_id')->references('id')->on('sessao_caixas');
            $table->foreign('mov_sessaocaixa_venda_id')->references('id')->on('vendas');
            $table->foreign('mov_sessaocaixa_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacao_sessao_caixas');
    }
};
