<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artwork_id');
            $table->integer('jawa');
            $table->integer('sumatera');
            $table->integer('kalimantan');
            $table->integer('sulawesi');
            $table->integer('papua');
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
        Schema::dropIfExists('shipping_cost');
    }
}
