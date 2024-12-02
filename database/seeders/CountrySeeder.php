<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create(['name' => 'United States']);
        Country::create(['name' => 'Canada']);
        Country::create(['name' => 'United Kingdom']);
        Country::create(['name' => 'Germany']);
        Country::create(['name' => 'France']);
        Country::create(['name' => 'Myanmar']);
    }
}
