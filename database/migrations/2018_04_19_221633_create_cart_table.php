<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Cart', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('session_id', 100);
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->dateTime('date');
            $table->ipAddress('ip');
            $table->foreign('product_id')->references('id')->on('Product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('Cart');
    }
}
