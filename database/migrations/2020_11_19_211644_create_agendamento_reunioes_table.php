<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentoReunioesTable extends Migration
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
            $table->date('data');
            $table->text('local');
            $table->unsignedBigInteger('id_ocs');
            $table->foreign('id_ocs')->references('id')->on('ocs');
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
        Schema::dropIfExists('agendamento_reunioes');
    }
}
