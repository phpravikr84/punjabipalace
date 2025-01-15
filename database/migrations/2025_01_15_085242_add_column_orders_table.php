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
        Schema::table('orders', function (Blueprint $table) {
            // Add columns
            $table->unsignedBigInteger('customer_id')->after('id')->nullable();
            $table->dateTime('order_date')->after('customer_id')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('order_type', ['Dine_In', 'Takeaway'])->after('order_date');
            $table->enum('service_type', ['Dine In', 'Take Away', 'Room Service'])->after('order_type')->default('Dine In');
            $table->decimal('total_amount', 10, 2)->after('service_type');
            $table->enum('status', ['NEW', 'Processing', 'Rejected', 'Closed', 'Cancelled'])->after('total_amount')->default('NEW');
            $table->string('reason', 150)->after('status')->nullable();
        
            // Add the foreign key constraint
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
