<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbusuariomedicoconsultorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbusuariomedicoconsultorio', function (Blueprint $table) {
            $table->id('usacodigo');
            $table->unsignedBigInteger('usucodigo');
            $table->unsignedBigInteger('meccodigo');

            $table->foreign('usucodigo')->references('usucodigo')->on('users');
            $table->foreign('meccodigo')->references('meccodigo')->on('tbmedicoconsultorio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbusuariomedicoconsultorio');
    }
}
