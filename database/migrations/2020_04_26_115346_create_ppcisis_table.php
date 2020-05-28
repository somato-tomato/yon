<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpcisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppcisis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idPPC');
            $table->string('namaMaterial');
            $table->string('satuan');
            $table->integer('jumlahMaterial');
            $table->integer('satuanHarga');
            $table->integer('jumlahHarga');
            $table->integer('serahJumlahMaterial');
            $table->date('serahTanggal');
            $table->text('keterangan');
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
        Schema::dropIfExists('ppcisis');
    }
}
