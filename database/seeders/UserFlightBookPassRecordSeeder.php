<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserFlightBookPassRecord;

class UserFlightBookPassRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFlightBookPassRecord::create([
            'user_flight_book_id' => 1,
            'first_name' => 'Ariel',
            'middle_name' => 'Nova',
            'last_name' => 'Christian',
            'passport' => 'RA000750',
            'DOB' => '2001-03-19',
        ]);
        UserFlightBookPassRecord::create([
            'user_flight_book_id' => 1,
            'first_name' => 'Aliando',
            'last_name' => 'Putra',
            'passport' => 'RA000751',
            'DOB' => '2014-09-22',
        ]);
        UserFlightBookPassRecord::create([
            'user_flight_book_id' => 1,
            'first_name' => 'Yongha',
            'last_name' => 'Who',
            'passport' => 'RA000752',
            'DOB' => '2020-09-28',
        ]);
    }
}
