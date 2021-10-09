<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbcontatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbcontato', function (Blueprint $table) {
            $table->id('cntcodigo');
            $table->smallInteger('cnttipo');
            $table->text('cntdescricao');
            $table->smallInteger('cntpreferencial');
            $table->unsignedBigInteger('usucodigo')->nullable();
            $table->unsignedBigInteger('concodigo')->nullable();
            $table->smallInteger('cntativo');

            $table->foreign('usucodigo')->references('usucodigo')->on('users');
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
        Schema::dropIfExists('tbcontato');
    }
}
