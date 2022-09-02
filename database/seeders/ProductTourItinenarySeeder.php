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
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "BALI - OSAKA",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA – NARA – OSAKA",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA – KYOTO – OSAKA",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA – KOBE SANDA PREMIUM OUTLETS – OSAKA",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA FREE TIME",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "OSAKA CITY TOUR - BALI",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 1, 'label' => "TIBA DI BALI",'transport' => '']);

        ProductTourItinenary::create(['tour_id' => 2, 'label' => "KETIBAAN DI BRISBANE - GOLD COAST",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 2, 'label' => "GOLD COAST",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 2, 'label' => "GOLD COAST- SYDNEY",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 2, 'label' => "SYDNEY + LUNCHEON CRUISE",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 2, 'label' => "KEBERANGKATAN",'transport' => '']);

        ProductTourItinenary::create(['tour_id' => 3, 'label' => "JAKARTA – ISTANBUL",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "TIBA DI ISTANBUL – BURSA - KUSADASI", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "KUSADASI - PAMUKKALE", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "PAMUKKALE - KONYA - CAPPADOCIA ", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "FULL DAY CAPPADOCIA ", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "CAPPADOCIA - ANKARA - ISTANBUL", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "ISTANBUL FULLDAY CITY TOUR", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "ISTANBUL DEPARTURE", 'breakfast' => true, 'lunch' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 3, 'label' => "ISTANBUL – JAKARTA",'transport' => '']);

        ProductTourItinenary::create(['tour_id' => 4, 'label' => "KEBERANGKATAN", 'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 4, 'label' => "SINGAPORE",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 4, 'label' => "KETIBAAN", 'transport' => '']);

        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Tiba Delhi",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Delhi - Srinagar", 'breakfast' => true, 'lunch' => true, 'dinner' => true, 'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Srinagar - Gulmarg - Srinagar", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Srinagar - Delhi + Agra, 205 kms", 'breakfast' => true, 'lunch' => true, 'dinner' => true, 'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Agra - Jaipur, 245 kms", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 5, 'label' => "Di Jaipur", 'breakfast' => true, 'lunch' => true, 'dinner' => true,'transport' => '']);

        ProductTourItinenary::create(['tour_id' => 6, 'label' => "KEBERANGKATAN", 'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 6, 'label' => "KETIBAAN DI GOLD COAST",'transport' => '']);
        ProductTourItinenary::create(['tour_id' => 6, 'label' => "GOLD COAST",'transport' => '']);
    }
}
