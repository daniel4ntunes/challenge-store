<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_added');
            $table->unsignedInteger('customer_id');
            $table->decimal('total', 10, 2);
            $table->foreign('customer_id')->references('id')->on('Customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('Transaction');
    }
}
