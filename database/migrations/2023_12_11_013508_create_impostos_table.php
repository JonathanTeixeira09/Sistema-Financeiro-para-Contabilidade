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
        Schema::create('impostos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //$table->string('tipoImposto', 255);
            $table->float('valorImpostoCompra', 15,2);
            $table->float('valorImpostoVenda', 15,2)->nullable()->default(NULL);
            $table->date('dataCompra');
            $table->date('dataVenda')->nullable()->default(NULL);
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
        Schema::dropIfExists('impostos');
    }
};
