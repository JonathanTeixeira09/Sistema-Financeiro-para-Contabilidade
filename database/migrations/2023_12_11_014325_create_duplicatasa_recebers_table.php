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
        Schema::create('duplicatasa_recebers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('valorMovimento', 15,2);
            $table->date('dataMovimento');
            //$table->string('tipoMovimento', 255);
            $table->string('statusDuplicatas', 100);
            $table->unsignedBigInteger('idVenda')->nullable;
            $table->foreign('idVenda')->references('id')->on('vendas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duplicatasa_recebers');
    }
};
