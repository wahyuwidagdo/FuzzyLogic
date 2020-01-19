<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataFuzziesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_fuzzies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fasilitas_kn');
            $table->integer('fasilitas_cn');
            $table->integer('fasilitas_sn');
            $table->integer('pelayanan_kb');
            $table->integer('pelayanan_cb');
            $table->integer('pelayanan_sb');
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
        Schema::dropIfExists('data_fuzzies');
    }
}
