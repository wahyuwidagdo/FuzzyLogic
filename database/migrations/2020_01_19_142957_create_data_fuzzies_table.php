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
            $table->double('fasilitas_kn');
            $table->double('fasilitas_cn');
            $table->double('fasilitas_sn');
            $table->double('pelayanan_kb');
            $table->double('pelayanan_cb');
            $table->double('pelayanan_sb');
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
