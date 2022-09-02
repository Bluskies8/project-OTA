<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourCountrytag;

class ProductTourCountrytagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourCountrytag::create(['tour_id' => 1, 'country_id' => '87']);
        ProductTourCountrytag::create(['tour_id' => 1, 'country_id' => '169']);
        ProductTourCountrytag::create(['tour_id' => 2, 'country_id' => '116']);
        ProductTourCountrytag::create(['tour_id' => 2, 'country_id' => '169']);
        ProductTourCountrytag::create(['tour_id' => 3, 'country_id' => '87']);
        ProductTourCountrytag::create(['tour_id' => 3, 'country_id' => '12']);
        ProductTourCountrytag::create(['tour_id' => 4, 'country_id' => '87']);
        ProductTourCountrytag::create(['tour_id' => 4, 'country_id' => '12']);
        ProductTourCountrytag::create(['tour_id' => 4, 'country_id' => '169']);
    }
}
