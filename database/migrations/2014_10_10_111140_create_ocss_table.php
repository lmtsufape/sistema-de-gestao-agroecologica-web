<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocss', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //// TODO: Temos que saber quais são os atributos daqui, esse migration foi criado só pra tabela
            ////        ser referenciada em users!!!
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocss');
    }
}
