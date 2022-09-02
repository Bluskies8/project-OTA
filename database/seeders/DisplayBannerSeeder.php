<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DisplayBanner;

class DisplayBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisplayBanner::create([
            'title' => 'Holiday Package',
            'index' => 1,
            'description' => 'Travel to exciting destinations with flights, hotel, transfers and tours - all packaged up!',
            'tags' => '1,2'
        ]);
        DisplayBanner::create([
            'title' => 'Holiday Package2',
            'index' => 2,
            'description' => 'Travel to exciting destinations with flights, hotel, transfers and tours - all packaged up!',
            'tags' => '2'
        ]);
    }
}
