<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cid'); // Foreign key referencing users table
            $table->string('empcode', 20)->nullable();
            $table->string('empname', 50)->nullable();
            $table->string('sex', 1)->nullable();
            $table->string('fathername', 50)->nullable();
            $table->string('department', 3)->nullable();
            $table->string('designation', 3)->nullable();
            $table->date('joindate')->nullable();
            $table->text('address')->nullable();
            $table->string('city', 20)->nullable();
            $table->string('district', 20)->nullable();
            $table->string('state', 20)->nullable();
            $table->string('pincode', 12)->default('0');
            $table->string('country', 20)->nullable();
            $table->string('mobileno', 15)->nullable();
            $table->string('emailid', 30)->nullable();
            $table->string('qualification', 20)->nullable();
            $table->float('basic', 8, 2)->default(0);
            $table->float('da', 8, 2)->default(0);
            $table->float('ta', 8, 2)->default(0);
            $table->float('hra', 8, 2)->default(0);
            $table->float('pf', 8, 2)->default(0);
            $table->float('netpay', 8, 2)->default(0);
            $table->date('dob')->nullable();
            $table->string('bank', 50)->nullable();
            $table->string('bankb', 30)->nullable();
            $table->string('accno', 20)->nullable();
            $table->string('ifsc', 20)->nullable();
            $table->string('bacc', 50)->nullable();
            $table->string('acct', 2)->nullable();
            $table->float('gross', 8, 2)->default(0);
            $table->time('intime')->nullable();
            $table->time('outtime')->nullable();
            $table->string('rfid', 20)->nullable();
            $table->string('fpid', 20)->nullable();
            $table->string('cl', 3)->nullable();
            $table->string('ml', 3)->nullable();
            $table->integer('account_type')->default(6)->comment('2-Manager | 3-Cashier | 4-Kitchen Manager | 5-Cook | 6-Waiter');
            $table->text('remarks')->nullable();
            $table->boolean('active')->default(1);
            $table->text('infotext')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns

            // Foreign key constraint
            $table->foreign('cid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
