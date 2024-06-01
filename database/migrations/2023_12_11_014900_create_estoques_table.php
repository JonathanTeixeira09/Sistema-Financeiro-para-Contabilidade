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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('categoriaProduto', 255);
            $table->string('statusEstoque', 255);
            $table->string('nomeProduto', 255);
            $table->unsignedBigInteger('idCompra')->nullable()->default(NULL);
            $table->foreign('idCompra')->references('id')->on('compras');
            $table->unsignedBigInteger('idVenda')->nullable()->default(NULL);
            $table->foreign('idVenda')->references('id')->on('vendas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
