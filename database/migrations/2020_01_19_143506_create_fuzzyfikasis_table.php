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
            $table->double('kurang_nyaman');
            $table->double('cukup_nyaman');
            $table->double('sangat_nyaman');
            $table->double('kurang_baik');
            $table->double('cukup_baik');
            $table->double('sangat_baik');
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
