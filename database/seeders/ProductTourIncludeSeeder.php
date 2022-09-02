<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourInclude;

class ProductTourIncludeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourInclude::create(['tour_id' => 1, 'item' => "Ticket pesawat udara p.p kelas ekonomi dengan .....berdasarkan kondisi tiket group"]);
        ProductTourInclude::create(['tour_id' => 1, 'item' => "Penginapan hotel bintang 4*"]);
        ProductTourInclude::create(['tour_id' => 1, 'item' => "Makanan sesuai dengan keterangan yang tercantum didalam acara perjalanan ( MPagi/ MSiang / MMalam )"]);
        ProductTourInclude::create(['tour_id' => 1, 'item' => "Airport tax international & fuel surcharge"]);
        ProductTourInclude::create(['tour_id' => 1, 'item' => "Tiket masuk objek wisata sesuai dengan itinerary Perjalanan"]);
        ProductTourInclude::create(['tour_id' => 1, 'item' => "Entrance Ticket Sesuai Program Itinerary"]);
        ProductTourInclude::create(['tour_id' => 1, 'item' => "Transport, Tours Sesuai Program Itinerary"]);
        ProductTourInclude::create(['tour_id' => 1, 'item' => "Asuransi Perjalanan Perlindungan Covid-19"]);
    }
}
