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
            $table->boolean('cntativo');
            $table->text('cntdescricao');
            $table->boolean('cntpreferencial');
            $table->unsignedBigInteger('usucodigo')->nullable();

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
        Schema::dropIfExists('tbcontato');
    }
}
