<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePulausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulaus', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nama_pulau')->unique();
            $table->String('luas');
            $table->unsignedInteger('id_negara');
            $table->foreign('id_negara')->references('id')->on('negaras')->ondelete('cascade');
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
        Schema::dropIfExists('pulaus');
    }
}
