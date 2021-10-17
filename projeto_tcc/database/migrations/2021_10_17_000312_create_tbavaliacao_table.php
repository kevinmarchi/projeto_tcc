<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbavaliacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbavaliacao', function (Blueprint $table) {
            $table->id('avacodigo');
            $table->text('avadescricao');
            $table->smallInteger('avanota');
            $table->unsignedBigInteger('cnscodigo');

            $table->foreign('cnscodigo')->references('cnscodigo')->on('tbconsulta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbavaliacao');
    }
}
