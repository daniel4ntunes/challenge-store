<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zipcode', 8);
            $table->string('street', 255);
            $table->string('number', 20);
            $table->string('complement', 100);
            $table->string('neighbourhood', 150);
            $table->string('city', 100);
            $table->string('state', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('Address');
    }
}
