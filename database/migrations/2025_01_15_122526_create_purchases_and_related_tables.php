<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesAndRelatedTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Purchases Table
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->nullable()->comment('Foreign Key linking to the Vendors table');
            $table->dateTime('order_date')->nullable()->comment('Date when the order was placed');
            $table->dateTime('delivery_date')->nullable()->comment('Expected delivery date');
            $table->enum('status', ['Pending', 'Completed', 'Cancelled'])->default('Pending')->comment('Status of the purchase');
            $table->boolean('is_direct_purchase')->default(false)->comment('Whether this is a direct purchase');
            $table->string('attachment')->nullable()->comment('Path to the vendor invoice or related documents');
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
        });

        // Purchase Items Table
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id')->comment('Foreign Key linking to the Purchase table');
            $table->unsignedBigInteger('stock_id')->comment('Foreign Key linking to the Stock table');
            $table->decimal('quantity', 12, 2)->default(0)->comment('Quantity ordered');
            $table->decimal('unit_price', 12, 2)->default(0)->comment('Price per unit at the time of purchase');
            $table->decimal('total_price', 12, 2)->default(0)->comment('Calculated as quantity * unit_price');
            $table->timestamps();

            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_items');
        Schema::dropIfExists('purchases');
    }
}
