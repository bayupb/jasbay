<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeunggulanModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keunggulan_models', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_keunggulan');
            $table->string('nama_keunggulan');
            $table->text('deskripsi_keunggulan');
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
        Schema::dropIfExists('keunggulan_models');
    }
}
