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
        Schema::table('stock', function (Blueprint $table) {
            $table->unsignedBigInteger('stock_item_id')->after('id');
            $table->unsignedBigInteger('uom_id')->after('quantity');

            $table->foreign('stock_item_id')->references('id')->on('stock_items')->onDelete('cascade');
            $table->foreign('uom_id')->references('id')->on('uoms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock', function (Blueprint $table) {
            $table->dropForeign('stock_item_id');
            $table->dropForeign('uom_id');
        });
    }
};
