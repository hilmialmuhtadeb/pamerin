<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibition_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exhibition_id');
            $table->foreignId('user_id');
            $table->string('code');
            $table->string('bukti')->nullable();
            $table->integer('subtotal');
            $table->integer('unique');
            $table->integer('summary');
            $table->string('status_id');
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
        Schema::dropIfExists('exhibition_user');
    }
}
