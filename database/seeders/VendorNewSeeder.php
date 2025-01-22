<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendorNewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Insert two dummy Australian vendor records into the 'vendors' table
         $vendor1 = DB::table('vendors')->insertGetId([
            'sname' => 'John Doe Punjabiyat',
            'uid' => 1,
            'tax_number' => '1234567890',
            'saddr' => '123 Main Street',
            'scity' => 'Sydney',
            'sdist' => 'New South Wales',
            'spin' => '2000',
            'sstate' => 'New South Wales',
            'scountry' => 'Australia',
            'scperson' => 'John Doe Punjabiyat',
            'scmob' => '+61 412 345 678',
            'sphone' => '+61 2 9876 5432',
            'cin' => 'CIN1234555',
            'pan' => 'PAN123555',
            'email' => 'vendor1@example.com',
            'accholder' => 'John Doe Punjabiyat',
            'accno' => '923456789012',
            'bankname' => 'Commonwealth Bank',
            'bankbranch' => 'Sydney CBD',
            'ifsc' => 'CBBSYXXX',
            'remarks' => 'First dummy Australian vendor',
            'infotext' => 'Information about Vendor One',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
