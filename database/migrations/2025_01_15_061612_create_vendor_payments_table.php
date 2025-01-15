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
        Schema::create('vendor_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid')->nullable(); // Foreign key referencing users table
            $table->unsignedBigInteger('vid')->nullable(); // Foreign key referencing vendors table
            $table->unsignedInteger('prid')->comment('Purchase return ID');
            $table->string('sid', 5)->nullable();
            $table->string('pid', 10)->nullable();
            $table->string('rtid', 10)->nullable();
            $table->decimal('netamt', 10, 2)->default(0);
            $table->decimal('paid_amt', 10, 2)->default(0);
            $table->decimal('due_amt', 10, 2)->default(0);
            $table->date('paiddate')->nullable();
            $table->char('type', 1)->comment('d => DEBITED FROM PURCHASE, c => CREDIT FROM PURCHASE RETURN')->nullable();
            $table->char('ptype', 1)->nullable();
            $table->boolean('is_due_payment')->default(false);
            $table->unsignedBigInteger('prev_vendor_payment_id')->nullable();
            $table->text('remarks')->nullable();
            $table->text('infotext')->nullable();
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vid')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('prev_vendor_payment_id')->references('id')->on('vendor_payments')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_payments');
    }
};
