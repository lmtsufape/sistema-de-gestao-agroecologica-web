<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanteirodeproducaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canteirodeproducaos', function (Blueprint $table) {
            $table->id();
            $table->integer('tamanho');
            $table->string('localizacao');
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
        Schema::dropIfExists('canteirodeproducaos');
    }
}
