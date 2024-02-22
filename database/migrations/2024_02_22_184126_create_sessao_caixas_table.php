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
        Schema::create('sessao_caixas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('sessaocaixa_data_hora_abertura');
            $table->dateTime('sessaocaixa_data_hora_fechamento')->nullable();
            $table->decimal('sessaocaixa_saldo_inicial',7,2)->default('0.00');
            $table->decimal('sessacaixa_saldo_final',7,2)->default('0.00');
            $table->unsignedBigInteger('sessaocaixa_id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessao_caixas');
    }
};
