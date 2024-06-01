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
        Schema::create('dividas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('valorDivida', 15,2);
            $table->date('dataDivida');
            $table->string('descricaoDivida', 255);
            $table->string('statusDivida', 100);
            $table->unsignedBigInteger('idCompra')->nullable;
            $table->foreign('idCompra')->references('id')->on('compras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dividas');
    }
};
