<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserFlightBook;

class UserFlightBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFlightBook::create([
            'group_id' => 1,
            'airlines_id' => 1,
            'transaction_id' => '841210011252',
            'booking_code' => '6K8HE2',
            'book_date' => '2021-10-13 16:55:18',
            'nta' => 8615798,
            'clean_price' => 8963600,
            'created_at' => '2021-10-13 16:55:40',
        ]);
    }
}
