<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefuzzyfikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defuzzyfikasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('z1');
            $table->integer('z2');
            $table->integer('z3');
            $table->integer('z4');
            $table->integer('z5');
            $table->integer('z6');
            $table->integer('z7');
            $table->integer('z8');
            $table->integer('z9');
            $table->integer('z-hasil');
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
        Schema::dropIfExists('defuzzyfikasis');
    }
}
