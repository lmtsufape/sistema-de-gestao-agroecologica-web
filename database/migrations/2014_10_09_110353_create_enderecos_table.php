<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('estado')->nullable(true);
            $table->string('cidade')->nullable(true);
            $table->string('bairro')->nullable(true);
            $table->string('nome_rua')->nullable(true);
            $table->string('cep')->nullable(true);
            $table->unsignedInteger('numero_casa')->nullable(true);
            $table->string('ponto_referencia')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
