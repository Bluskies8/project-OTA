<?php

namespace App\Http\Controllers;

use App\Duffel\DuffelAPI;
use App\Models\Airport;
use App\Models\DisplayBanner;
use App\Models\ProductTour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function searchFlight(Request $request)
    {
        $request->validate([
            'passanger' => 'numeric|required',

        ]);
        for ($i=0; $i < $request->passanger; $i++) {
            $pass[$i] =[
                'type' => 'adult'
            ];
        }
        $data = [
            'type' =>$request->type,
            'cabin' => $request->class,
            'departure_date' => $request->depart,
            'origin' => $request->departure,
            'destination' => $request->destination,
            'pass' => $pass
        ];
        // return $request->depart;
        $day = Carbon::createFromFormat('Y-m-d', $request->depart)->format('l');
        $date = Carbon::createFromFormat('Y-m-d', $request->depart)->format('d-m-Y');
        // dd($day);
        $res = DuffelAPI::SearchFlight($data);
        // dd($res->data);
        return view('pages.user.ticket',[
            'data' => $res->data,
            'pass_count' => $request->passanger,
            'cabin' => $request->class,
            'date' => $day.", ".$date
        ]);
    }
    public function home()
    {
        // return view('pages.user.index');
        $display = DisplayBanner::where('enabled',1)->orderBy('index', 'ASC')->first();
        $tour = ProductTour::get();
        $airport = DuffelAPI::getAirport();
        // foreach ($display as $tagg) {
        if ($display) {
            $temp = [];
            $explode = explode(',', $display->tags);
            foreach ($explode as $ex) {
                foreach ($tour as $key3) {
                    $tourexplode = explode(',', $key3->tags);
                    if(in_array($ex, $tourexplode)){
                        $boolean = false;
                        foreach ($temp as $key) {
                            if($key->id == $key3->id){
                                $boolean = true;
                            }
                        }
                        if(!$boolean && $key3->enabled===1){
                            $key3->product_type = 'tour';
                            $key3->header_img_url = env('APP_URL').'/tour/imgh/'.$key3->id;
                            $key3->thumbnail_img_url = env('APP_URL').'/tour/imgt/'.$key3->id;
                            $temp []=$key3;
                        }
                    }
                }
            }
            usort($temp,function($a,$b){
                return $a->id > $b->id?1:-1;
            });
            $display->products = $temp;
        }
        // }
        // dd($display);
        return view('pages.user.index',[
            'airport' => $airport->data,
            'product' => $display
        ]);
    }

    public function DoBook(Request $request)
    {
        // foreach ($request->pass as $key ) {
            $pass = [
                "type"=> "adult",
                "title"=> "mrs",
                "phone_number"=> "+442080160509",
                "infant_passenger_id"=> "pas_00009hj8USM8Ncg32aTGHL",
                "identity_documents"=> [
                    [
                        "unique_identifier"=> "19KL56147",
                        "type"=> "passport",
                        "issuing_country_code"=> "GB",
                        "expires_on"=> "2025-04-25"
                    ]
                ],
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
        dd($res);
    }

    public function showheader($id)
    {
        $data = ProductTour::where('id',$id)->first();
        return response()->file(storage_path('/app/public'.$data->header_img_url));
    }
    public function showthumb($id)
    {
        $data = ProductTour::where('id',$id)->first();
        return response()->file(storage_path('/app/public'.$data->thumbnail_img_url));
    }
}
