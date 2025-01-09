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
        Schema::table('stock', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['vendor_id']); // Foreign key name is optional, array ensures correct syntax
            
            // Then drop the column
            $table->dropColumn('vendor_id');
        });
    }

    public function down()
    {
        Schema::table('stock', function (Blueprint $table) {
            // Re-add the vendor_id column
            $table->unsignedBigInteger('vendor_id')->nullable();

            // Restore the foreign key constraint
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }
};
