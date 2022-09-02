<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourHighlight;

class ProductTourHighlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourHighlight::create(['tour_id' => 1, 'item' => "BALI"]);
        ProductTourHighlight::create(['tour_id' => 1, 'item' => "OSAKA"]);
        ProductTourHighlight::create(['tour_id' => 1, 'item' => "NARA"]);
        ProductTourHighlight::create(['tour_id' => 1, 'item' => "KYOTO"]);
        ProductTourHighlight::create(['tour_id' => 1, 'item' => "KOBE SANDA PREMIUM OUTLETS"]);

        ProductTourHighlight::create(['tour_id' => 2, 'item' => "BRISBANE"]);
        ProductTourHighlight::create(['tour_id' => 2, 'item' => "GOLD COAST"]);
        ProductTourHighlight::create(['tour_id' => 2, 'item' => "SYDNEY"]);
        ProductTourHighlight::create(['tour_id' => 2, 'item' => "LUNCHEON CRUISE"]);

        ProductTourHighlight::create(['tour_id' => 3, 'item' => "JAKARTA"]);
        ProductTourHighlight::create(['tour_id' => 3, 'item' => "ISTANBUL"]);
        ProductTourHighlight::create(['tour_id' => 3, 'item' => "BURSA"]);
        ProductTourHighlight::create(['tour_id' => 3, 'item' => "KUSADASI"]);
        ProductTourHighlight::create(['tour_id' => 3, 'item' => "PAMUKKALE"]);
        ProductTourHighlight::create(['tour_id' => 3, 'item' => "KONYA"]);
        ProductTourHighlight::create(['tour_id' => 3, 'item' => "CAPPADOCIA"]);
        ProductTourHighlight::create(['tour_id' => 3, 'item' => "ANKARA"]);

        ProductTourHighlight::create(['tour_id' => 4, 'item' => "SINGAPORE"]);

        ProductTourHighlight::create(['tour_id' => 5, 'item' => "Delhi"]);
        ProductTourHighlight::create(['tour_id' => 5, 'item' => "Srinagar"]);
        ProductTourHighlight::create(['tour_id' => 5, 'item' => "Gulmarg"]);
        ProductTourHighlight::create(['tour_id' => 5, 'item' => "Agra"]);
        ProductTourHighlight::create(['tour_id' => 5, 'item' => "Jaipur"]);

        ProductTourHighlight::create(['tour_id' => 6, 'item' => "GOLD COAST"]);
    }
}
