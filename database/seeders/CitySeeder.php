<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $us = Country::where('name', 'United States')->first();
        $canada = Country::where('name', 'Canada')->first();
        $uk = Country::where('name', 'United Kingdom')->first();
        $germany = Country::where('name', 'Germany')->first();
        $france = Country::where('name', 'France')->first();
        $myanmar = Country::where('name', 'Myanmar')->first();  // Myanmar country

        // Add cities for each country
        City::create(['name' => 'New York', 'country_id' => $us->id]);
        City::create(['name' => 'Los Angeles', 'country_id' => $us->id]);
        City::create(['name' => 'Toronto', 'country_id' => $canada->id]);
        City::create(['name' => 'Vancouver', 'country_id' => $canada->id]);
        City::create(['name' => 'London', 'country_id' => $uk->id]);
        City::create(['name' => 'Manchester', 'country_id' => $uk->id]);
        City::create(['name' => 'Berlin', 'country_id' => $germany->id]);
        City::create(['name' => 'Munich', 'country_id' => $germany->id]);
        City::create(['name' => 'Paris', 'country_id' => $france->id]);
        City::create(['name' => 'Marseille', 'country_id' => $france->id]);

        
        City::create(['name' => 'Yangon', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Mandalay', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Naypyidaw', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Bago', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Taunggyi', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Mawlamyine', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Pathein', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Sittwe', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Myitkyina', 'country_id' => $myanmar->id]);
        City::create(['name' => 'Magway', 'country_id' => $myanmar->id]);

    }
}
