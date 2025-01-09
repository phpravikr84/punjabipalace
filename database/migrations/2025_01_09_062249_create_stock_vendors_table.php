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
        Schema::create('stock_vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('vendor_id');
            $table->decimal('unit_price', 10, 2);
            $table->integer('priority')->comment('1 => High Priority');
            $table->integer('is_active')->comment('0 => pending, 1 => active, 2 => canceled');
            $table->timestamps();
        
            // Add Foreign Keys
            $table->foreign('stock_id')->references('id')->on('stock')->onDelete('cascade'); // Fixed table name 'stocks'
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade'); // Fixed typo in 'references'
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_vendors');
    }
};
