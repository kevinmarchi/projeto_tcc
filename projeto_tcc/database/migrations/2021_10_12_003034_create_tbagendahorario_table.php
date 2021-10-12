<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbagendahorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbagendahorario', function (Blueprint $table) {
            $table->id('aghcodigo');
            $table->unsignedBigInteger('agencodigo');
            $table->string('aghdescricao', 100);
            $table->date('aghdata');
            $table->time('aghhorarioinicio');
            $table->time('aghhorariofim');
            $table->smallInteger('aghsituacao')->default(1);

            $table->foreign('agencodigo')->references('agencodigo')->on('tbagenda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbagendahorario');
    }
}
