<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInferensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inferensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('a-predikat1');
            $table->integer('a-predikat2');
            $table->integer('a-predikat3');
            $table->integer('a-predikat4');
            $table->integer('a-predikat5');
            $table->integer('a-predikat6');
            $table->integer('a-predikat7');
            $table->integer('a-predikat8');
            $table->integer('a-predikat9');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inferensis');
    }
}
