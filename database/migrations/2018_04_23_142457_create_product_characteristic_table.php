<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCharacteristicTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ProductCharacteristic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('characteristic_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ProductCharacteristic');
    }
}
