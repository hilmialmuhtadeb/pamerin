<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworkUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artwork_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artwork_id');
            $table->foreignId('user_id');
            $table->string('code');
            $table->string('street');
            $table->string('city');
            $table->string('region');
            $table->string('zipcode');
            $table->integer('status_id');
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
        Schema::dropIfExists('artwork_user');
    }
}
