<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTour;

class ProductTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTour::create([
            'supplier_id' => 1,
            'slug' => '7-days-explore-osaka-tokyo',
            'name' => '7 DAYS EXPLORE OSAKA - TOKYO',
            'header_img_url' => '/Tour/Tour1/imgh/tour1.jpg',
            'thumbnail_img_url' =>'/Tour/Tour1/imgt/tour1.jpg',
            'pass_minim' => 5,
            'start_price' => 25000000,
            'gimmic_price' => 35000000,
            'downpayment' => 500000,
            'is_domestic' => true,
            'include_flight' => true,
            'days_count' => 7,
            'nights_count' => 6,
            'pass_limit' => 10,
            'valid_date_start' => '2021-11-20',
            'valid_date_end' => '2022-12-20',
            'keyword' => '7-days-explore-osaka-tokyo,is domestic,include flight, 7 days, 6 nights, limit 10',
            'tags' => '2',
            'countrytag' => "95",
            'enabled' => 1
        ]);
        ProductTour::create([
            'supplier_id' => 1,
            'slug' => '5-days-brisbane-gold-coast-sydney',
            'name' => '5 DAYS BRISBANE- GOLD COAST - SYDNEY',
            'header_img_url' => '/Tour/Tour2/imgh/tour2.jpg',
            'thumbnail_img_url' =>'/Tour/Tour2/imgt/tour2.jpg',
            'pass_minim' => 5,
            'start_price' => 8950000,
            'gimmic_price' => 9988000,
            'downpayment' => 500000,
            'is_domestic' => true,
            'include_flight' => true,
            'days_count' => 5,
            'nights_count' => 4,
            'pass_limit' => 10,
            'valid_date_start' => '2021-11-20',
            'valid_date_end' => '2022-12-20',
            'keyword' => '5 days brisbane gold coast sydney,is domestic,include flight, 5 days, 4 nights, limit 10',
            'tags' => '1',
            'countrytag' => "95",
            'enabled' => 1
        ]);
        ProductTour::create([
            'supplier_id' => 1,
            'slug' => '9-days-wonderful-turkey',
            'name' => '9 DAYS WONDERFUL TURKEY',
            'header_img_url' => '/Tour/Tour3/imgh/tour3.jpg',
            'thumbnail_img_url' =>'/Tour/Tour3/imgt/tour3.jpg',
            'pass_minim' => 5,
            'start_price' => 12950000,
            'gimmic_price' => 22950000,
            'downpayment' => 500000,
            'is_domestic' => true,
            'include_flight' => true,
            'days_count' => 9,
            'nights_count' => 9,
            'pass_limit' => 10,
            'valid_date_start' => '2021-11-20',
            'valid_date_end' => '2022-12-20',
            'keyword' => '9 days wonderful turkey,is domestic,include flight, 9 days, 9 nights, limit 10',
            'tags' => '2',
            'countrytag' => "95",
            'enabled' => 1
        ]);
        ProductTour::create([
            'supplier_id' => 1,
            'slug' => '3-days-singapore-free-easy',
            'name' => '3 DAYS SINGAPORE FREE & EASY',
            'header_img_url' => '/Tour/Tour4/imgh/tour4.jpg',
            'thumbnail_img_url' =>'/Tour/Tour4/imgt/tour4.jpg',
            'pass_minim' => 5,
            'start_price' => 1850000,
            'gimmic_price' => 2850000,
            'downpayment' => 500000,
            'is_domestic' => true,
            'include_flight' => true,
            'days_count' => 3,
            'nights_count' => 3,
            'pass_limit' => 10,
            'valid_date_start' => '2021-11-20',
            'valid_date_end' => '2022-12-20',
            'keyword' => '3 days singapore free easy,is domestic,include flight, 7 days, 6 nights, limit 10',
            'tags' => '1,2',
            'countrytag' => "95",
            'enabled' => 1
        ]);
        ProductTour::create([
            'supplier_id' => 1,
            'slug' => '6-days-golden-triangle-khasmir-tour',
            'name' => '6 DAYS GOLDEN TRIANGLE - KHASMIR TOUR',
            'header_img_url' => '/Tour/Tour5/imgh/tour5.jpg',
            'thumbnail_img_url' =>'/Tour/Tour5/imgt/tour5.jpg',
            'pass_minim' => 5,
            'start_price' => 7988000,
            'gimmic_price' => 8988000,
            'downpayment' => 500000,
            'is_domestic' => true,
            'include_flight' => true,
            'days_count' => 6,
            'nights_count' => 5,
            'pass_limit' => 10,
            'valid_date_start' => '2021-11-20',
            'valid_date_end' => '2022-12-20',
            'keyword' => '6 days golden triangle khasmir tour,is domestic,include flight, 6 days, 5 nights, limit 10',
            'tags' => '1',
            'countrytag' => "95",
            'enabled' => 1
        ]);
        ProductTour::create([
            'supplier_id' => 1,
            'slug' => '3-days-gold-coast-free-easy',
            'name' => '3 DAYS GOLD COAST FREE & EASY',
            'header_img_url' => '/Tour/Tour6/imgh/tour6.jpg',
            'thumbnail_img_url' =>'/Tour/Tour6/imgt/tour6.jpg',
            'pass_minim' => 5,
            'start_price' => 2454000,
            'gimmic_price' => 3454000,
            'downpayment' => 500000,
            'is_domestic' => true,
            'include_flight' => true,
            'days_count' => 3,
            'nights_count' => 2,
            'pass_limit' => 10,
            'valid_date_start' => '2021-11-20',
            'valid_date_end' => '2022-12-20',
            'keyword' => '3 days gold coast free easy,is domestic,include flight, 3 days, 2 nights, limit 10',
            'tags' => '2',
            'countrytag' => "95",
            'enabled' => 1
        ]);
    }
}
