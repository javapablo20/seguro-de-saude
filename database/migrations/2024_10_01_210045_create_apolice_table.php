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
        Schema::create('apolice', function (Blueprint $table) {
            $table->id();
            $table->date('datainicio');
            $table->date('datafim');
            $table->string('status');
            $table->float('valor');
            $table->string('alteracao');
            $table->string('descricao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apolice');
    }
};
