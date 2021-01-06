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
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento')->nullable();
            $table->boolean('primeiro_acesso');
            $table->string('cpf')->unique();
            $table->string('rg')->unique()->nullable();
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->unsignedBigInteger('ocs_id');
            $table->foreign('ocs_id')->references('id')->on('ocs');
            $table->string('telefone')->nullable();
            $table->string('tipo_perfil');  // Se é ciirdenador ou produtor
            $table->string('perfil_coordenador')->nullable();
            $table->string('nome_conjugue')->nullable();
            $table->text('nome_filhos')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
