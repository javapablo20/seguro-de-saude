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
        Schema::create('cliente', function (Blueprint $table) {
            $table->string('cpf')->unique;
            $table->string('nome');
            $table->integer('idade');
            $table->string('email');
            $table->string('senha');
            $table->string('telefone');
            $table->string('endereco');
            $table->date('datanascimento');
            $table->string('historicomedico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
