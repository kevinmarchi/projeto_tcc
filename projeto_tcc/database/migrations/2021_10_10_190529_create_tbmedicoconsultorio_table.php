<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmedicoconsultorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbmedicoconsultorio', function (Blueprint $table) {
            $table->id('meccodigo');
            $table->unsignedBigInteger('concodigo');
            $table->unsignedBigInteger('medcodigo');

            $table->foreign('concodigo')->references('concodigo')->on('tbconsultorio');
            $table->foreign('medcodigo')->references('medcodigo')->on('tbmedico')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbmedicoconsultorio');
    }
}
