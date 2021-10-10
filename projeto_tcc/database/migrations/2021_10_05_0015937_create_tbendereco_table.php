<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbenderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbendereco', function (Blueprint $table) {
            $table->id('endcodigo');
            $table->string('endlogradouro', 255);
            $table->integer('endnumero');
            $table->text('endcomplemento');
            $table->unsignedBigInteger('cidcodigo');

            $table->foreign('cidcodigo')->references('cidcodigo')->on('tbcidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbendereco');
    }
}
