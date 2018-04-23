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
            $table->integer('customer_id');
            $table->decimal('total', 10, 2);
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
