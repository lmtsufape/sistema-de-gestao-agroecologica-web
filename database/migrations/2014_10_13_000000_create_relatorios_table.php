<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->text('problemas');
            $table->text('possiveis_solucoes');
            $table->longText('observacoes');
            $table->unsignedBigInteger('id_propriedade');
            $table->foreign('id_propriedade')->references('id')->on('propriedades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relatorios');
    }
}
