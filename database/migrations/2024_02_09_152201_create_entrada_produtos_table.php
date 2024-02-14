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
        Schema::create('entrada_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrada_produto_id');
            $table->decimal('entrada_quantidade',7,2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('entrada_produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrada_produtos');
    }
};
