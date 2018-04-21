<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionProductTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('TransactionProduct', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transaction_id');
            $table->string('des', 255);
            $table->decimal('unit_price', 10, 2);
            $table->integer('quantity');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('Product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('TransactionProduct');
    }
}
