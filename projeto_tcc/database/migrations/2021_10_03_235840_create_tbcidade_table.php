<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbcidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbcidade', function (Blueprint $table) {
            $table->id('cidcodigo');
            $table->string('cidnome', 100);
            $table->unsignedBigInteger('estcodigo');

            $table->foreign('estcodigo')->references('estcodigo')->on('tbestado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbcidade');
    }
}
