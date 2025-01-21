<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameStockItemsAndCategoriesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the `stock_items` table exists before renaming
        if (Schema::hasTable('stock_items')) {
            Schema::rename('stock_items', 'items');
        }

        // Check if the `stock_items_categories` table exists before renaming
        if (Schema::hasTable('stock_item_categories')) {
            Schema::rename('stock_item_categories', 'item_categories');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Check if the `items` table exists before renaming back
        if (Schema::hasTable('items')) {
            Schema::rename('items', 'stock_items');
        }

        // Check if the `item_categories` table exists before renaming back
        if (Schema::hasTable('item_categories')) {
            Schema::rename('item_categories', 'stock_item_categories');
        }
    }
}
