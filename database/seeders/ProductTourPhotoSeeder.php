<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourPhoto;

class ProductTourPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourPhoto::create(['tour_id' => 1, 'title' => 'Picture 1', 'img_url' => '/images/product/100012.jpg']);
        ProductTourPhoto::create(['tour_id' => 2, 'title' => 'Picture 1', 'img_url' => '/images/product/100022_13.jpg']);
        ProductTourPhoto::create(['tour_id' => 3, 'title' => 'Picture 1', 'img_url' => '/images/product/100014.jpg']);
        ProductTourPhoto::create(['tour_id' => 4, 'title' => 'Picture 1', 'img_url' => '/images/product/100015.jpg']);
        ProductTourPhoto::create(['tour_id' => 5, 'title' => 'Picture 1', 'img_url' => '/images/product/100016.jpg']);
        ProductTourPhoto::create(['tour_id' => 6, 'title' => 'Picture 1', 'img_url' => '/images/product/100017.jpg']);
    }
}
