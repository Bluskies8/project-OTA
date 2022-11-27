<?php

namespace Database\Seeders;

use App\Models\kodeReferal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodeReferalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kodeReferal::create(['tipe' => "tour","kode" =>"tour1", 'discount' => 5, "limit" => 10]);
        kodeReferal::create(['tipe' => "flight","kode" =>"flight1", 'discount' => 5, "limit" => 10]);
    }
}
