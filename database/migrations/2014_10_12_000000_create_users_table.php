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
            $table->date('data_nascimento');
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->unsignedBigInteger('id_endereco');
            $table->foreign('id_endereco')->references('id')->on('enderecos');
            $table->unsignedBigInteger('id_osc');
            $table->foreign('id_osc')->references('id')->on('ocs');
            $table->string('telefone');
            $table->string('tipo_perfil');  // Se é ciirdenador ou produtor
            $table->string('nome_conjugue')->nullable();
            $table->text('nome_filhos')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
