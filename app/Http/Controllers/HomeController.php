<?php

namespace App\Http\Controllers;

use App\Duffel\DuffelAPI;
use App\Models\Airport;
use App\Models\DisplayBanner;
use App\Models\ProductTour;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function searchFlight(Request $request)
    {
        // dd($request->all());
        return view('welcome');
    }
    public function home()
    {
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
        return view('index',[
            'airport' => $airport->data,
            'product' => $display
        ]);
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
