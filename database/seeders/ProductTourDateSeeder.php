<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourDate;

class ProductTourDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourDate::create(['tour_id' => 1, 'date_start' => "2022-02-01", 'date_end' => "2022-02-07", 'adult_twin_share_price' => "123456", 'single_suplement_price' => "1234567", 'child_with_bed_price' => '123', 'child_no_bed_price' => '1234']);
        ProductTourDate::create(['tour_id' => 1, 'date_start' => "2022-02-10", 'date_end' => "2022-02-17", 'adult_twin_share_price' => "123456", 'single_suplement_price' => "1234567", 'child_with_bed_price' => '123', 'child_no_bed_price' => '1234']);
    }
}
