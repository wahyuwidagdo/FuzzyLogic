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
            $table->double('z1');
            $table->double('z2');
            $table->double('z3');
            $table->double('z4');
            $table->double('z5');
            $table->double('z6');
            $table->double('z7');
            $table->double('z8');
            $table->double('z9');
            $table->double('z_hasil');
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
