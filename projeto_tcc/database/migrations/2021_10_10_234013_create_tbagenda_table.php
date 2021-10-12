<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbagendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbagenda', function (Blueprint $table) {
            $table->id('agencodigo');
            $table->string('agendescricao', 100);
            $table->unsignedBigInteger('meccodigo');
            $table->unsignedBigInteger('calcodigo');

            $table->foreign('meccodigo')->references('meccodigo')->on('tbmedicoconsultorio');
            $table->foreign('calcodigo')->references('calcodigo')->on('tbcalendario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbagenda');
    }
}
