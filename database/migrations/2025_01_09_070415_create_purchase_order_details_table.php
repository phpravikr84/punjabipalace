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
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->nullable(); // Nullable for direct purchases
            $table->dateTime('order_date');
            $table->dateTime('delivery_date');
            $table->enum('status', ['Pending', 'Completed', 'Cancelled'])->default('Pending');
            $table->boolean('is_direct_purchase')->default(false);
            $table->string('attachment', 255)->nullable(); // Path to invoice or documents
            $table->timestamps();

            // Add Foreign Key
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_details');
    }
};
