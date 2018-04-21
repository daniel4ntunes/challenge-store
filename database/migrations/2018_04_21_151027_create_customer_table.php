<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('cpf', 14);
            $table->string('phone', 15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('Customer');
    }
}
