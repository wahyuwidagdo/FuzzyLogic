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
            $table->double('a_predikat1');
            $table->double('a_predikat2');
            $table->double('a_predikat3');
            $table->double('a_predikat4');
            $table->double('a_predikat5');
            $table->double('a_predikat6');
            $table->double('a_predikat7');
            $table->double('a_predikat8');
            $table->double('a_predikat9');
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
