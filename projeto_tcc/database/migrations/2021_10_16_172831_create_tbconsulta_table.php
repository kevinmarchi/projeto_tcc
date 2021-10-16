<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbconsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbconsulta', function (Blueprint $table) {
            $table->id('cnscodigo');
            $table->smallInteger('cnssituacao')->default(1);
            $table->unsignedBigInteger('usucodigo');
            $table->unsignedBigInteger('aghcodigo');

            $table->foreign('usucodigo')->references('usucodigo')->on('users');
            $table->foreign('aghcodigo')->references('aghcodigo')->on('tbagendahorario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbconsulta');
    }
}
