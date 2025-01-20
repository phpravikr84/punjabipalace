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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('companyname', 100)->nullable();
            $table->string('company_logo', 100)->nullable();
            $table->string('contact_person_name', 100)->nullable();
            $table->tinyInteger('company_type')->comment('1 => Sole Trader, 2 => Partnership, 3 => Limited Company, 4 => Limited Liability Partnership, 5 => Proprietary Limited Company');
            $table->string('caddr', 100)->nullable();
            $table->unsignedBigInteger('city')->nullable();
            $table->string('dist', 50)->nullable();
            $table->string('pin', 10)->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->unsignedBigInteger('country')->nullable();
            $table->string('cmob', 15)->nullable();
            $table->string('cphone', 20)->nullable();
            $table->string('designation', 30)->nullable();
            $table->string('registrationno', 50)->nullable();
            $table->string('tinno', 50)->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
