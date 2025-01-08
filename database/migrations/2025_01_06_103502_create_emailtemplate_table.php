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
        Schema::create('emailtemplate', function (Blueprint $table) {
            $table->id();
            $table->string('template_title');
            $table->text('short_description');
            $table->longText('content');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps(); // Automatically creates created_at and updated_at columns
            $table->softDeletes(); // To handle soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emailtemplate');
    }
};
