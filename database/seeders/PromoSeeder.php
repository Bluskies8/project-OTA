<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::create([
            'title' => 'promo 1',
            'description' => 'promo akhir tahun',
            'tags' => '1,2'
        ]);
    }
}
