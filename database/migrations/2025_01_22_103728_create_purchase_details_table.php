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
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id')->comment('Foreign Key linking to purchases table');
            $table->unsignedBigInteger('item_id')->comment('Foreign Key linking to stock items');
            $table->string('tran_type', 10)->comment('Transaction Type: In/Out');
            $table->string('stock_remarks', 20)->nullable()->comment('Stock remarks');
            $table->decimal('qty', 12, 2)->default(0)->comment('Quantity');
            $table->decimal('unit_price', 12, 2)->comment('Unit Price');
            $table->unsignedBigInteger('uom_id')->comment('Foreign Key linking to UOMs table');
            $table->decimal('total_price', 12, 2)->comment('Total Price (calculated)');
            $table->timestamps();

            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_details');
    }
};
