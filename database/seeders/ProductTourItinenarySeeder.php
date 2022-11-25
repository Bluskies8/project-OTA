<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourItinenary;

class ProductTourItinenarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "BALI - OSAKA"]);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA – NARA – OSAKA"]);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA – KYOTO – OSAKA"]);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA – KOBE SANDA PREMIUM OUTLETS – OSAKA"]);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA FREE TIME"]);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA CITY TOUR - BALI"]);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "TIBA DI BALI"]);

        ProductTourItinenary::create(['tour_id' => 2, 'label' => "KETIBAAN DI BRISBANE - GOLD COAST"]);
        ProductTourItinenary::create(['tour_id' => 2, 'label' => "GOLD COAST"]);
        ProductTourItinenary::create(['tour_id' => 2, 'label' => "GOLD COAST- SYDNEY"]);
        ProductTourItinenary::create(['tour_id' => 2, 'label' => "SYDNEY + LUNCHEON CRUISE"]);
        ProductTourItinenary::create(['tour_id' => 2, 'label' => "KEBERANGKATAN"]);

        ProductTourItinenary::create(['tour_id' => 3, 'label' => "JAKARTA – ISTANBUL"]);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "TIBA DI ISTANBUL – BURSA - KUSADASI"]);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "KUSADASI - PAMUKKALE"]);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "PAMUKKALE - KONYA - CAPPADOCIA "]);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "FULL DAY CAPPADOCIA "]);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "CAPPADOCIA - ANKARA - ISTANBUL"]);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "ISTANBUL FULLDAY CITY TOUR"]);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "ISTANBUL DEPARTURE"]);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "ISTANBUL – JAKARTA"]);

        ProductTourItinenary::create(['tour_id' => 4, 'label' => "KEBERANGKATAN"]);
        ProductTourItinenary::create(['tour_id' => 4, 'label' => "SINGAPORE"]);
        ProductTourItinenary::create(['tour_id' => 4, 'label' => "KETIBAAN"]);

        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Tiba Delhi"]);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Delhi - Srinagar"]);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Srinagar - Gulmarg - Srinagar"]);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Srinagar - Delhi + Agra, 205 kms"]);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Agra - Jaipur, 245 kms"]);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Di Jaipur"]);

        ProductTourItinenary::create(['tour_id' => 6, 'label' => "KEBERANGKATAN"]);
        ProductTourItinenary::create(['tour_id' => 6, 'label' => "KETIBAAN DI GOLD COAST"]);
        ProductTourItinenary::create(['tour_id' => 6, 'label' => "GOLD COAST"]);
    }
}
