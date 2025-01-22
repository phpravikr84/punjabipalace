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
        if (Schema::hasTable('purchases')) {
            Schema::drop('purchases');
        }

        if (Schema::hasTable('purchase_details')) {
            Schema::drop('purchase_details');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('purchases')) {
            Schema::create('purchases', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                // Add any additional columns here if needed
            });
        }

        if (!Schema::hasTable('purchase_details')) {
            Schema::create('purchase_details', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                // Add any additional columns here if needed
            });
        }

    }
};
