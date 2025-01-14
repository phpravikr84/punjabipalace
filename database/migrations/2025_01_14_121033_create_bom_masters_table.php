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
        Schema::create('bom_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id')->comment('Foreign key referencing menu_items table');
            $table->unsignedBigInteger('stock_id')->comment('Foreign key referencing stock table');
            $table->unsignedBigInteger('uom_id')->comment('Unit of Measure ID');
            $table->string('uom_name')->comment('Unit of Measure Name');
            $table->decimal('used_qty', 10, 2)->comment('Quantity used from stock');
            $table->decimal('used_cost', 10, 2)->comment('Cost of used stock');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stock')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bom_masters');
    }
};
