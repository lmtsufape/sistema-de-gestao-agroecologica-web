<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetificacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retificacaos', function (Blueprint $table) {
            $table->id();
            $table->text('retificacao');
            $table->date('data');
            $table->unsignedBigInteger('reuniao_id');
            $table->foreign('reuniao_id')->references('id')->on('reuniaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retificacaos');
    }
}
