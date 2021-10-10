<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbconsultoriohorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbconsultoriohorario', function (Blueprint $table) {
            $table->id('cohcodigo');
            $table->unsignedBigInteger('concodigo');
            $table->time('cohhorainicio');
            $table->time('cohhorafim');
            $table->smallInteger('cohtipo');

            $table->foreign('concodigo')->references('concodigo')->on('tbconsultorio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbconsultoriohorario');
    }
}
