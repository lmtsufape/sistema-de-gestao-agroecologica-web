<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associacaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cnpj')->unique();
            $table->string('celular')->nullable();
            $table->string('fax')->nullable();
            $table->string('unidade_federacao');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associacaos');
    }
}
