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
        Schema::create('menu_item_txns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id')->comment('Foreign key referencing menu_items table');
            $table->string('order_no')->nullable()->comment('Order number associated with the transaction');
            $table->decimal('menu_item_stock_qty', 10, 2)->comment('Quantity of menu items in stock');
            $table->enum('stock_in_out', [1, 2])->comment('1 = In, 2 = Out');
            $table->enum('stock_in_out_reason', [1, 2, 3, 4, 5])->comment('1 = Normal stock in, 2 = Menu Item Sell, 3 = Purchase Return, 4 = Damaged, 5 = Expired');
            $table->string('remarks')->nullable()->comment('Additional remarks or notes for the transaction');
            $table->date('txn_date')->comment('Transaction date');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_item_txns');
    }
};
