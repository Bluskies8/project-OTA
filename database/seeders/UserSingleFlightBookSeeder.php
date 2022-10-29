<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserSingleFlightBook;

class UserSingleFlightBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserSingleFlightBook::create([
            'invoice' => 'LISFGH2021101900001',
            'order_by' => 1,
            'book_status' => 1,
            'payment_status' => 0,
            'transactionId' => '591210011257',
            'booking_code' => '6N9LV3',
            'book_date' => '2021-10-19 20:23:14',
            'nta' => 1643458,
            'total' => 1699200,
            'city_route' => 'DPS-CGK',
            'created_at' => '2021-10-19 20:23:19',
        ]);
    }
}
