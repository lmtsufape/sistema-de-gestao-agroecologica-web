<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoMapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_mapas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propriedade_id');
            $table->string('path');
            $table->foreign('propriedade_id')->references('id')->on('propriedades');
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
        Schema::dropIfExists('foto_mapas');
    }
}
