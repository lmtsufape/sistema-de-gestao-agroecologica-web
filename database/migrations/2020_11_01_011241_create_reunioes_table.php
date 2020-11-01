<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunioesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reuniaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nome');
            $table->date('data');
            $table->text('participantes');
            $table->longText('descricao');

            $table->unsignedBigInteger('id_ocs');
            $table->foreign('id_ocs')->references('id')->on('ocs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reunioes');
    }
}
