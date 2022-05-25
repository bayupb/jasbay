<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_pakets', function (Blueprint $table) {
            $table->id();
            $table->string('judul_jasa_paket');
            $table->string('harga_jasa_paket');
            $table->string('sub_title_harga_jasa_paket');
            $table->string('nama_jasa_paket');
            $table->unsignedBigInteger('fitur_harga_paket_id');
            $table->foreign('fitur_harga_paket_id')->references('id')->on('fitur_harga_paket_models');
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
        Schema::dropIfExists('jasa_pakets');
    }
}
