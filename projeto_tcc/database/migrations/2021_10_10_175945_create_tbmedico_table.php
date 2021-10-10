<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbmedico', function (Blueprint $table) {
            $table->id('medcodigo');
            $table->text('medregistro');
            $table->unsignedBigInteger('usucodigo');

            $table->foreign('usucodigo')->references('usucodigo')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbmedico');
    }
}
