<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuzzyfikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuzzyfikasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kurang_nyaman');
            $table->integer('cukup_nyaman');
            $table->integer('sangat_nyaman');
            $table->integer('kurang_baik');
            $table->integer('cukup_baik');
            $table->integer('sangat_baik');
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
        Schema::dropIfExists('fuzzyfikasis');
    }
}
