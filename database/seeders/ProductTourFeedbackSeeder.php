<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourFeedback;

class ProductTourFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourFeedback::create(['tour_id' => 1, 'user_id' => 1, 'rating' => 3]);
        ProductTourFeedback::create(['tour_id' => 1, 'user_id' => 2, 'rating' => 4]);
    }
}
