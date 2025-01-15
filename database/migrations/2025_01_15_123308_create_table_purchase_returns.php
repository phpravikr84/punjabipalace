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
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->nullable()->comment('Foreign Key linking to the Vendors table');
            $table->unsignedBigInteger('user_id')->nullable()->comment('Foreign Key linking to the Users table');
            $table->unsignedBigInteger('stock_id')->nullable()->comment('Foreign Key linking to the Stock table');
            $table->string('rtid', 10)->nullable()->comment('Return Transaction ID');
            $table->date('ret_date')->nullable()->comment('Date of the return');
            $table->decimal('credit_amt', 12, 2)->default(0)->comment('Credit amount for the returned items');
            $table->decimal('qty_ok', 12, 2)->default(0)->comment('Quantity accepted as okay');
            $table->decimal('qty_def', 12, 2)->default(0)->comment('Quantity defective');
            $table->text('remarks')->nullable()->comment('Remarks about the return');
            $table->dateTime('txn_time')->nullable()->comment('Transaction time');
            $table->text('info_text')->nullable()->comment('Additional information');
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_returns');
    }
};
