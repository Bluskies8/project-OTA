<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourThermcond;

class ProductTourThermcondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourThermcond::create(['tour_id' => 1, 'item' => "",'text'=>""]);
    }
}
