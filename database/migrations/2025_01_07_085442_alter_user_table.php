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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('remember_token')->nullable();
            $table->string('contact_number')->after('role_id')->nullable();
            $table->integer('status')->after('contact_number')->default(1)->comment('0 => inactive, 1 => active');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']); // Drop foreign key first
            $table->dropColumn('role_id');
            $table->dropColumn('contact_number');
            $table->dropColumn('status');
        });
    }
};
