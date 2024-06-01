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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomeProduto', 200);
            $table->float('valorCompra', 15, 2);
            $table->date('dataCompra');
            $table->string('tipoCompra', 100);
            $table->float('valorImposto', 15,2);
            $table->unsignedBigInteger('idProduto')->nullable;
            $table->foreign('idProduto')->references('id')->on('produtos');
            $table->unsignedBigInteger('idNotaFiscal')->nullable;
            $table->foreign('idNotaFiscal')->references('id')->on('nota_fiscals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
