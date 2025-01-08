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
        // Update menus table
        Schema::table('menus', function (Blueprint $table) {
            if (!Schema::hasColumn('menus', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('id');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            }
        });

        // Update orders table
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'order_date')) {
                $table->dateTime('order_date')->nullable()->after('order_status');
            }
            if (!Schema::hasColumn('orders', 'order_type')) {
                $table->enum('order_type', ['Dine_In', 'Takeaway'])->nullable()->after('order_date');
            }
            if (!Schema::hasColumn('orders', 'total_amount')) {
                $table->decimal('total_amount', 10, 2);
            }
        });

        // Create menu_items table
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('is_bom')->default(false);
            $table->unsignedBigInteger('stock_id')->nullable();
            $table->enum('menu_type', ['Dine_In', 'Takeaway', 'Both']);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('menu_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });

        // Create customization_options table
        Schema::create('customization_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id');
            $table->string('option_name');
            $table->string('option_value');
            $table->decimal('additional_price', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
        });

        // Create dietary_attributes_master table
        Schema::create('dietary_attributes_master', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create dietary_labels table
        Schema::create('dietary_labels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id');
            $table->unsignedBigInteger('dietary_attribute_id');
            $table->timestamps();

            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
            $table->foreign('dietary_attribute_id')->references('id')->on('dietary_attributes_master')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop dietary_labels table
        Schema::dropIfExists('dietary_labels');

        // Drop dietary_attributes_master table
        Schema::dropIfExists('dietary_attributes_master');

        // Drop customization_options table
        Schema::dropIfExists('customization_options');

        // Drop menu_items table
        Schema::dropIfExists('menu_items');

        // Revert orders table
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'order_date')) {
                $table->dropColumn('order_date');
            }
            if (Schema::hasColumn('orders', 'order_type')) {
                $table->dropColumn('order_type');
            }
            if (Schema::hasColumn('orders', 'total_amount')) {
                $table->dropColumn('total_amount');
            }
        });

        // Revert menus table
        Schema::table('menus', function (Blueprint $table) {
            if (Schema::hasColumn('menus', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });
    }
};
