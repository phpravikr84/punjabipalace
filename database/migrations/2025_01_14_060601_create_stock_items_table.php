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
        Schema::create('stock_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->unsignedBigInteger('item_category_id');
            $table->unsignedBigInteger('uom_id');
            $table->string('uom_name')->nullable();
            $table->timestamps();

            $table->foreign('item_category_id')->references('id')->on('stock_item_categories')->onDelete('cascade');
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
        Schema::dropIfExists('stock_items');
    }
};
