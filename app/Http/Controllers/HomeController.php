<?php

namespace App\Http\Controllers;

use App\Duffel\DuffelAPI;
use App\Models\DisplayBanner;
use App\Models\ProductTour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function setCookie(Request $request)
    {
        Cookie::queue($request->name, json_encode($request->data), '20');
        // return redirect('/Flight/searchFlight2')->withCookie(cookie($request->name, json_encode($request->data), '20'));
        return "success";
    }

    public function searchFlight(Request $request)
    {
        $passid = '';
        for ($i=0; $i < $request->passanger; $i++) {
            $pass[$i] =[
                'type' => 'adult'
            ];
        }
        if($request->type == 2){
            $request->validate([
                'passanger' => 'numeric|required',
                'depart' => 'required|date',
                'departure' => 'required',
                'destination' => 'required|different:departure',
                'return' => 'required|date|after:depart',
            ]);
        }else{
            $request->validate([
                'passanger' => 'numeric|required',
                'depart' => 'required|date',
                'departure' => 'required',
                'destination' => 'required|different:departure',
            ]);
        }
        $airport = DuffelAPI::getAirport();
        if($request->type == 2){
            $data = [
                'cabin' => $request->class,
                'departure_date' => $request->depart,
                'return_date' => $request->return,
                'origin' => $request->departure,
                'destination' => $request->destination,
                'pass' => $pass
            ];
        }else{
            $data = [
                'cabin' => $request->class,
                'departure_date' => $request->depart,
                'origin' => $request->departure,
                'destination' => $request->destination,
                'pass' => $pass
            ];
        }
        // dd($data);
        $day = Carbon::createFromFormat('Y-m-d', $request->depart)->format('l');
        $date = Carbon::createFromFormat('Y-m-d', $request->depart)->format('d-m-Y');
        $res = DuffelAPI::SearchFlight($data);
        // dd($res->data);
        foreach ($res->data->passengers as $key => $value) {
            if($passid == ''){
                $passid = $value->id;
            }else{
                $passid = ','.$value->id;
            }
        }
        $minutes = 1;
        // Cookie::queue('data_flight1',json_encode($temp),60);
        // $response->withCookie(cookie('name', 'virat', $minutes));
        // return $response;
        // dd($passid);
        return view('pages.user.ticket',[
            'airport' => $airport->data,
            'data' => $res->data,
            'pass_count' => $request->passanger,
            'cabin' => $request->class,
            'days' => $day.", ".$date,
            'depart_date' => $date,
            'return_date' => ($request->return)?$request->return:"",
            'type' => $request->type,
            'passid' => $passid
        ]);
    }

    public function searchFlight2(Request $request)
    {
        $flight1 = json_decode($request->cookie('dataFlight1'));
        // dd($flight1);
        for ($i=0; $i < $flight1->pass_count; $i++) {
            $pass[$i] =[
                'type' => 'adult'
            ];
        }
        $data = [
            'cabin' => $flight1->cabin,
            'departure_date' => $flight1->return_date,
            'origin' => $flight1->destination,
            'destination' => $flight1->departure,
            'pass' => $pass
        ];
        $day = Carbon::createFromFormat('Y-m-d', $flight1->return_date)->format('l');
        // return $day;
        $date = Carbon::createFromFormat('Y-m-d', $flight1->return_date)->format('d-m-Y');
        $res = DuffelAPI::SearchFlight($data);
        // dd($res->data);
        // return $res->data;
        return view('pages.user.ticket2',[
            'data' => $res->data,
            'pass_count' => $flight1->pass_count,
            'cabin' => $flight1->cabin,
            'days' => $day.", ".$date,
            'date' => $date,
            'type' => $flight1->type,
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

    public function datadiriTour(Request $request) {
        $data = json_decode($request->cookie('QuoteTour'));
        // dd($data);
        return view('pages.user.datadiri',[
            'room' => $data->room
        ]);
    }
    public function datasubmit(Request $request) {
        return $request->all();
    }
}
