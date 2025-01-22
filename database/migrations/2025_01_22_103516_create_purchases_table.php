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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->comment('Foreign Key linking to vendors table');
            $table->string('tran_no', 20)->unique()->comment('Transaction Number');
            $table->date('odate')->comment('Order Date');
            $table->date('delivery_date')->nullable()->comment('Delivery Date');
            $table->text('remarks')->nullable()->comment('Additional remarks');
            $table->string('file_attach')->nullable()->comment('File attachment path');
            $table->timestamps();

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
        Schema::dropIfExists('purchases');
    }
};
