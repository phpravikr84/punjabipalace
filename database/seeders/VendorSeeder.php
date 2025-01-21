<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert user record into 'users' table for Vendor One
        $user_id1 = DB::table('users')->insertGetId([
            'name' => 'John Doe',
            'email' => 'vendor1@example.com',
            'password' => Hash::make('password123'), // Change this to your desired password
            'role_id' => 3, // Vendor role_id
            'contact_number' => '+61 412 345 678',
            'status' => 1, // Active
            'created_at' => now(),
            'updated_at' => now(),
        ]);

          // Insert two dummy Australian vendor records into the 'vendors' table
        $vendor1 = DB::table('vendors')->insertGetId([
            'sname' => 'Vendor One',
            'uid' => $user_id1,
            'tax_number' => '123456789',
            'saddr' => '123 Main Street',
            'scity' => 'Sydney',
            'sdist' => 'New South Wales',
            'spin' => '2000',
            'sstate' => 'New South Wales',
            'scountry' => 'Australia',
            'scperson' => 'John Doe',
            'scmob' => '+61 412 345 678',
            'sphone' => '+61 2 9876 5432',
            'cin' => 'CIN1234567',
            'pan' => 'PAN123456',
            'email' => 'vendor1@example.com',
            'accholder' => 'John Doe',
            'accno' => '123456789012',
            'bankname' => 'Commonwealth Bank',
            'bankbranch' => 'Sydney CBD',
            'ifsc' => 'CBBSYXXX',
            'remarks' => 'First dummy Australian vendor',
            'infotext' => 'Information about Vendor One',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

          // Insert user record into 'users' table for Vendor Two
        $user_id2 = DB::table('users')->insertGetId([
            'name' => 'Jane Smith',
            'email' => 'vendor2@example.com',
            'password' => Hash::make('password456'), // Change this to your desired password
            'role_id' => 3, // Vendor role_id
            'contact_number' => '+61 412 987 654',
            'status' => 1, // Active
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $vendor2 = DB::table('vendors')->insertGetId([
            'sname' => 'Vendor Two',
            'uid' => $user_id2,
            'tax_number' => '987654321',
            'saddr' => '456 Park Avenue',
            'scity' => 'Melbourne',
            'sdist' => 'Victoria',
            'spin' => '3000',
            'sstate' => 'Victoria',
            'scountry' => 'Australia',
            'scperson' => 'Jane Smith',
            'scmob' => '+61 412 987 654',
            'sphone' => '+61 3 9345 6789',
            'cin' => 'CIN7654321',
            'pan' => 'PAN654321',
            'email' => 'vendor2@example.com',
            'accholder' => 'Jane Smith',
            'accno' => '987654321098',
            'bankname' => 'Westpac Bank',
            'bankbranch' => 'Melbourne Central',
            'ifsc' => 'WPACAU2S',
            'remarks' => 'Second dummy Australian vendor',
            'infotext' => 'Information about Vendor Two',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

      
    }
}
