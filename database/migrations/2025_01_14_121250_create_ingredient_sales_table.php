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
        Schema::create('ingredient_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id')->comment('Foreign key referencing menu_items table');
            $table->unsignedBigInteger('stock_id')->nullable()->comment('Foreign key referencing stock table');
            $table->unsignedBigInteger('bom_id')->nullable()->comment('Foreign key referencing bom_masters table');
            $table->decimal('used_qty', 10, 2)->comment('Quantity of stock used for this menu item sale');
            $table->decimal('used_cost', 10, 2)->comment('Cost of stock used for this menu item sale');
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stock')->onDelete('cascade');
            $table->foreign('bom_id')->references('id')->on('bom_masters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_sales');
    }
};
