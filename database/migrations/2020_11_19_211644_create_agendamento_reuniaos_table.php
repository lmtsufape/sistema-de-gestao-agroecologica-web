<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentoReuniaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamento_reuniaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->dateTime('data');
            $table->text('local');
            $table->boolean('registrada');
            $table->unsignedBigInteger('ocs_id');
            $table->foreign('ocs_id')->references('id')->on('ocs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamento_reuniaos');
        Schema::dropIfExists('agendamento_reunioes');
    }
}
