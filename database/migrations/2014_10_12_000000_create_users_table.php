<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            #Todos os users vão ter esses:
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento')->nullable();
            $table->string('cpf')->unique();
            $table->string('rg')->unique()->nullable();
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->string('telefone')->nullable();
            $table->string('nome_conjugue')->nullable();
            $table->text('nome_filhos')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            #Isso aqui controla se o cara é coordenador, se sim, dois perfis devem ser criados
            $table->string('tipo_perfil');

            #Caso seja coordenador, deve ter o tipo de coordenador (tesoureiro etc)
            $table->string('perfil_coordenador')->nullable();

            #Caso seja um produtor comum, o usuário tera que completar as informações do perfil no primeiro acesso
            $table->boolean('primeiro_acesso');

            #ID ocs controla a quem o produtor pertence (OCS) e qual OCS o coordenador coordena rs
            $table->unsignedBigInteger('ocs_id');
            $table->foreign('ocs_id')->references('id')->on('ocs');



            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
