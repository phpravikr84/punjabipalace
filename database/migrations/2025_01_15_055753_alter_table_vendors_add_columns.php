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
        Schema::table('vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('uid')->after('id')->nullable(); // Foreign key referencing users table
            $table->string('sname', 100)->after('uid')->nullable();
            $table->string('tax_number', 20)->after('sname')->nullable();
            $table->string('saddr', 100)->after('tax_number')->nullable();
            $table->string('scity', 50)->after('saddr')->nullable();
            $table->string('sdist', 50)->after('scity')->nullable();
            $table->string('spin', 10)->after('sdist')->nullable();
            $table->string('sstate', 50)->after('spin')->nullable();
            $table->string('scountry', 50)->after('sstate')->nullable();
            $table->string('scperson', 100)->after('scountry')->nullable();
            $table->string('scmob', 15)->after('scperson')->nullable();
            $table->string('sphone', 15)->after('scmob')->nullable();
            $table->string('cin', 40)->after('sphone')->nullable();
            $table->string('pan', 30)->after('cin')->nullable();
            $table->string('email', 80)->after('pan')->nullable();
            $table->string('accholder', 50)->after('email')->nullable();
            $table->string('accno', 20)->after('accholder')->nullable();
            $table->string('bankname', 50)->after('accno')->nullable();
            $table->string('bankbranch', 50)->after('bankname')->nullable();
            $table->string('ifsc', 20)->after('bankbranch')->nullable();
            $table->text('remarks')->after('ifsc')->nullable();
            $table->text('infotext')->after('remarks')->nullable();

            // Foreign key constraint
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            //
        });
    }
};
