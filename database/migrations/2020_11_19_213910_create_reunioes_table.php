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
            $table->text('participantes');
            $table->longText('ata');
            $table->unsignedBigInteger('id_agendamento');
            $table->foreign('id_agendamento')->references('id')->on('agendamento_reuniaos');
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
        Schema::dropIfExists('reuniaos');
    }
}
