<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_ocs');
            $table->string('orgao_fiscalizador')->nullable();
            $table->unsignedBigInteger('associacao_id');
            $table->foreign('associacao_id')->references('id')->on('associacaos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocs');
        Schema::dropIfExists('ocss');
    }
}
