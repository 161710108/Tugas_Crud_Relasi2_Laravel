<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negaras', function (Blueprint $table) {
            $table->increments('id');
            $table->String('negara')->unique();
            $table->integer('jumlah_penduduk');
            $table->unsignedInteger('id_kepala_negara')->unique();
            $table->foreign('id_kepala_negara')->references('id')->on('kepala_negaras')->ondelete('cascade');
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
        Schema::dropIfExists('negaras');
    }
}
