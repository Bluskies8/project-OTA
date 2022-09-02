<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserFlightBookGroup;

class UserFlightBookGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFlightBookGroup::create([
            'invoice' => 'LTINV-20211018',
            'order_by' => 1,
            'order_date' => '2021-10-13 16:40:57',
            'departure_city' => '',
            'arrival_city' => '',
            'departure_date' => '2021-10-20 16:40:57',
            'arrival_date' => '2021-10-22 16:40:57',
            'book_status' => 3,
            'payment_status' => 1,
            'total_price' => 8963600,
            'created_at' => '2021-10-13 16:42:50',
        ]);
    }
}
