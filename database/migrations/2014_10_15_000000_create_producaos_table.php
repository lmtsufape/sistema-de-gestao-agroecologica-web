<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producaos', function (Blueprint $table) {
            $table->id();
            $table->date('data_inicio');
            $table->string('tipo_producao');
            $table->longText('observacoes')->nullable();
            $table->longText('lista_produtos');
            $table->longText('lista_produtos_exteriores_beneficiado')->nullable();
            $table->unsignedBigInteger('canteirodeproducao_id');
            $table->foreign('canteirodeproducao_id')->references('id')->on('canteirodeproducaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producaos');
    }
}
