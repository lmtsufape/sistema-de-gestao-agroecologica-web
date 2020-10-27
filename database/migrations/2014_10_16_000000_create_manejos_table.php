<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManejosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manejos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_tecnica');
            $table->longText('manejo');
            $table->longText('tratamento_residuos')->nullable();
            $table->longText('destino_residuos')->nullable();
            $table->longText('observacoes')->nullable();
            $table->string('tipo_manejo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manejos');
    }
}
