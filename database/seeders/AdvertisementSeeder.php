<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advertisement;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Advertisement::create(['url_image'=> '/public/Advertisement/Ads_1.jpg', 'direct_link' => 'https://www.google.com/' ]);
            Advertisement::create(['url_image'=> '/public/Advertisement/Ads_2.jpg', 'direct_link' => 'https://www.google.com/' ]);
            // Advertisement::create(['url_image'=> '/public/Advertisement/Ads_3.jpg', 'direct_link' => 'https://www.google.com/' ]);
            // Advertisement::create(['url_image'=> '/public/Advertisement/Ads_4.jpg', 'direct_link' => 'https://www.google.com/' ]);
            // Advertisement::create(['url_image'=> '/public/Advertisement/Ads_5.jpg', 'direct_link' => 'https://www.google.com/' ]);
            // Advertisement::create(['url_image'=> '/public/Advertisement/Ads_6.jpg', 'direct_link' => 'https://www.google.com/' ]);
            // Advertisement::create(['url_image'=> '/public/Advertisement/Ads_7.jpg', 'direct_link' => 'https://www.google.com/' ]);
            // Advertisement::create(['url_image'=> '/public/Advertisement/Ads_8.jpg', 'direct_link' => 'https://www.google.com/' ]);
            // Advertisement::create(['url_image'=> '/public/Advertisement/Ads_9.jpg', 'direct_link' => 'https://www.google.com/' ]);
            // Advertisement::create(['url_image'=> '/public/Advertisement/Ads_10.jpg', 'direct_link' => 'https://www.google.com/' ]);
    }
}
