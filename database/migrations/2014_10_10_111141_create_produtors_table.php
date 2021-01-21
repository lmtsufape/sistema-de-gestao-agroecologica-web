<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtors', function (Blueprint $table) {
            $table->id();
            #Todos os users vão ter esses:
            $table->date('data_nascimento')->nullable();
            $table->string('cpf')->unique();
            $table->string('rg')->unique()->nullable();
            $table->string('nome_conjugue')->nullable();
            $table->text('nome_filhos')->nullable();


            #Isso aqui controla se o cara é coordenador, se sim, dois perfis devem ser criados


            #Caso seja coordenador, deve ter o tipo de coordenador (tesoureiro etc)
            $table->string('perfil_coordenador')->nullable();

            #Caso seja um produtor comum, o usuário tera que completar as informações do perfil no primeiro acesso
            $table->boolean('primeiro_acesso');

            #ID ocs controla a quem o produtor pertence (OCS) e qual OCS o coordenador coordena rs
            $table->unsignedBigInteger('ocs_id');
            $table->foreign('ocs_id')->references('id')->on('ocs');


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
        Schema::dropIfExists('produtors');
    }
}
