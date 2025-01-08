<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyMasterTable extends Migration
{
    public function up()
    {
        Schema::create('currency_master', function (Blueprint $table) {
            $table->id();
            $table->string('currency_code', 10);
            $table->string('currency_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('currency_master');
    }
}
