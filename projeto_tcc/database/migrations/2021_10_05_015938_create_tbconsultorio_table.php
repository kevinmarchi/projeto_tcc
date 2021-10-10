<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbconsultorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbconsultorio', function (Blueprint $table) {
            $table->id('concodigo');
            $table->string('condescricao', 100);
            $table->boolean('conativo');
            $table->unsignedBigInteger('endcodigo');

            $table->foreign('endcodigo')->references('endcodigo')->on('tbendereco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbconsultorio');
    }
}
