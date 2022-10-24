<?php

namespace App\Http\Controllers;

use App\Duffel\DuffelAPI;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function booking(Request $request)
    {
        // foreach ($request->pass as $key ) {
            $pass = [
                "type"=> "adult",
                "title"=> "mrs",
                "phone_number"=> "+442080160509",
                "infant_passenger_id"=> "pas_00009hj8USM8Ncg32aTGHL",
                "id"=> "pas_00009hj8USM7Ncg31cBCLL",
                "given_name"=> "Amelia",
                "gender"=> "f",
                "family_name"=> "Earhart",
                "email"=> "amelia@duffel.com",
                "born_on"=> "1987-07-24"
            ];
        // }
        $data = [
            'amount' => $request->amount,
        ];
        $res = DuffelAPI::DOBook($data);
        // dd($res);
        return $request->all();
    }
}
