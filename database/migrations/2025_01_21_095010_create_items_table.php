<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('item_code')->nullable();
            $table->string('item_name')->nullable();
            $table->bigInteger('item_category_id')->unsigned();
            $table->bigInteger('uom_id')->unsigned();
            $table->string('uom_name')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('item_category_id')
                ->references('id')
                ->on('item_categories') // Updated table name
                ->onDelete('cascade');

            $table->foreign('uom_id')
                ->references('id')
                ->on('uoms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the foreign keys before dropping the table
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['item_category_id']);
            $table->dropForeign(['uom_id']);
        });

        // Drop the items table
        Schema::dropIfExists('items');
    }
}
