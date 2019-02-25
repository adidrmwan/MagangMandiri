<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bulan')->nullable();
            $table->string('id_atm')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('area')->nullable();
            $table->string('pengelola')->nullable();
            $table->string('jenis_lokasi')->nullable();
            $table->string('jenis_mesin')->nullable();
            $table->string('denom')->nullable();
            $table->string('item')->nullable();
            $table->string('volume')->nullable();
            $table->string('feebased')->nullable();
            $table->string('kuadran')->nullable();
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
        Schema::dropIfExists('performance');
    }
}
