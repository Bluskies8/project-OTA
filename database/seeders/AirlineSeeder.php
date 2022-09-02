<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Airline;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Airline::create([
            'name'=> 'Garuda Airline',
            'code'=> 'GA',
            "logo_square"=> "",
            "logo_rect"=> "",
        ]);
    }
}
