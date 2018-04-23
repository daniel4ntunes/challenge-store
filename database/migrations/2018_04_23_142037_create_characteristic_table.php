<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Characteristic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('des', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('Characteristic');
    }
}
