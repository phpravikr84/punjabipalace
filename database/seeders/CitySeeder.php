<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = DB::table('states')->get();

        $cities = [
            'New South Wales' => ['Sydney', 'Newcastle', 'Wollongong'],
            'Victoria' => ['Melbourne', 'Geelong', 'Ballarat'],
            'Queensland' => ['Brisbane', 'Gold Coast', 'Cairns'],
            'Western Australia' => ['Perth', 'Fremantle', 'Bunbury'],
            'South Australia' => ['Adelaide', 'Mount Gambier', 'Port Augusta'],
            'Tasmania' => ['Hobart', 'Launceston', 'Devonport'],
            'Australian Capital Territory' => ['Canberra'],
            'Northern Territory' => ['Darwin', 'Alice Springs', 'Katherine'],
        ];

        foreach ($cities as $stateName => $cityList) {
            $stateId = $states->where('name', $stateName)->first()->id;

            foreach ($cityList as $city) {
                DB::table('cities')->insert([
                    'name' => $city,
                    'state_id' => $stateId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
