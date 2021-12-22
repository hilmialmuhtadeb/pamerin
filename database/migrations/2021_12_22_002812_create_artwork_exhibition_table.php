<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworkExhibitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artwork_exhibition', function (Blueprint $table) {
            $table->id();
            $table->integer('exhibition_id')->unsigned();
            $table->integer('artwork_id')->unsigned();
            $table->foreign('exhibition_id')->references('id')->on('exhibitions');
            $table->foreign('artwork_id')->references('id')->on('artworks');
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
        Schema::dropIfExists('artwork_exhibition');
    }
}
