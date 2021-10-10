<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmedicoespecialidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbmedicoespecialidade', function (Blueprint $table) {
            $table->id('mescodigo');
            $table->unsignedBigInteger('medcodigo');
            $table->unsignedBigInteger('espcodigo');

            $table->foreign('medcodigo')->references('medcodigo')->on('tbmedico')->cascadeOnDelete();
            $table->foreign('espcodigo')->references('espcodigo')->on('tbespecialidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbmedicoespecialidade');
    }
}
