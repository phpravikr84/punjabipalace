<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countryId = DB::table('countries')->where('name', 'Australia')->value('id');

        $states = [
            ['name' => 'New South Wales', 'country_id' => $countryId],
            ['name' => 'Victoria', 'country_id' => $countryId],
            ['name' => 'Queensland', 'country_id' => $countryId],
            ['name' => 'Western Australia', 'country_id' => $countryId],
            ['name' => 'South Australia', 'country_id' => $countryId],
            ['name' => 'Tasmania', 'country_id' => $countryId],
            ['name' => 'Australian Capital Territory', 'country_id' => $countryId],
            ['name' => 'Northern Territory', 'country_id' => $countryId],
        ];

        foreach ($states as $state) {
            DB::table('states')->insert([
                'name' => $state['name'],
                'country_id' => $state['country_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
    }
}
