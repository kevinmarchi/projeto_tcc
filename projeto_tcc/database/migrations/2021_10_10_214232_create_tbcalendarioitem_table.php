<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbcalendarioitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbcalendarioitem', function (Blueprint $table) {
            $table->id('caicodigo');
            $table->unsignedBigInteger('calcodigo');
            $table->date('caidata');

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
        Schema::dropIfExists('tbcalendarioitem');
    }
}
