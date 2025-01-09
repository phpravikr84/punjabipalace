<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('currency_master', function (Blueprint $table) {
            $table->enum('default_currency', [1, 0])->default(0)->after('currency_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currency_master', function (Blueprint $table) {
            $table->dropColumn('default_currency');
        });
    }
};
