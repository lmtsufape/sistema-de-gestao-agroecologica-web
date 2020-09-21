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
            $table->string('cnpj')->unique();
            $table->string('nome_entidade');
            $table->unsignedBigInteger('id_endereco');
            $table->foreign('id_endereco')->references('id')->on('enderecos');
            $table->string('telefone');
            $table->string('celular')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('nome_para_contato');
            $table->string('orgao_fiscalizador')->nullable();
            $table->string('unidade_federacao');


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
    }
}
