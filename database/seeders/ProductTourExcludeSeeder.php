<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductTourExclude;

class ProductTourExcludeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTourExclude::create(['tour_id' => 1, 'item' => "Biaya pembuatan visa"]);
        ProductTourExclude::create(['tour_id' => 1, 'item' => "PPN 1 %"]);
        ProductTourExclude::create(['tour_id' => 1, 'item' => "PCR Test di Indonesia & Negara Tujuan"]);
        ProductTourExclude::create(['tour_id' => 1, 'item' => "Masker Kesehatan & Hand Sanitizer"]);
        ProductTourExclude::create(['tour_id' => 1, 'item' => "Tipping untuk lokal guide, pengemudi lokal, dan tour leader. (USD ..... per orang) belum termasuk porter hotel"]);
        ProductTourExclude::create(['tour_id' => 1, 'item' => "Pengeluaran yang bersifat pribadi antara lain, mini bar, laundry, pemakaian telepon, room service, tour tambahan dll."]);
    }
}
