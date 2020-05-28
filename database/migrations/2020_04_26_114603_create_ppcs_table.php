<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppcs', function (Blueprint $table) {
            $table->id();
            $table->string('nomorPPMJ');
            $table->date('tanggalPPMJ');
            $table->date('tanggalPO');
            $table->string('dasarPP');
            $table->date('tanggalPP');
            $table->string('tujuanSurat');
            $table->string('pemesan');
            $table->string('namaOrder');
            $table->string('nomorPO');
            $table->integer('jumlahOrder');
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
        Schema::dropIfExists('ppcs');
    }
}
