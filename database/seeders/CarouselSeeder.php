<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Carousel::create(['url_image'=> '/public/Carousel/c1.jpg', 'direct_link' => 'https://www.google.com/', ]);
            Carousel::create(['url_image'=> '/public/Carousel/c2.jpg', 'direct_link' => 'https://www.google.com/', ]);
            Carousel::create(['url_image'=> '/public/Carousel/c3.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c4.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c5.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c6.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c7.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c8.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c9.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c10.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c11.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c12.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c13.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c14.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c15.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c16.jpg', 'direct_link' => 'https://www.google.com/', ]);
            // Carousel::create(['url_image'=> '/public/Carousel/c17.jpg', 'direct_link' => 'https://www.google.com/', ]);
            Carousel::create(['url_image'=> '/public/Carousel/c18.jpg', 'direct_link' => 'https://www.google.com/', ]);
    }
}
