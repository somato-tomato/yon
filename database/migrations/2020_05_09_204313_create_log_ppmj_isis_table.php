<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPpmjIsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_ppmj_isis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idPPCIsi');
            $table->bigInteger('idVendor');
            $table->bigInteger('idUser');
            $table->integer('inputMaterial');
            $table->dateTime('inputTanggal');
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
        Schema::dropIfExists('log_ppmj_isis');
    }
}
