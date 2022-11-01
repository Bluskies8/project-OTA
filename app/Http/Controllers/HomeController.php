<?php

namespace App\Http\Controllers;

use App\Duffel\DuffelAPI;
use App\Models\Customer;
use App\Models\DisplayBanner;
use App\Models\Passport;
use App\Models\ProductsConfig;
use App\Models\ProductTour;
use App\Models\TourBooking;
use App\Models\TourBookingRoom;
use App\Models\TourPassanger;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function setCookie(Request $request)
    {
        $data = $request->cookie($request->name);
        if($data)Cookie::forget($request->name);
        Cookie::queue($request->name, json_encode($request->data), '60');
        // return redirect('/Flight/searchFlight2')->withCookie(cookie($request->name, json_encode($request->data), '20'));
        return "success";
    }

    public function loginUser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required'
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user) return redirect()->back()->with('error','email/password salah');
    }
    public function loginPages()
    {
        return view('pages.backoffice.login');
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
                $passid .= ','.$value->id;
            }
        }
        $minutes = 1;
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

    public function showheader($id)
    {
        $data = ProductTour::where('id',$id)->first();
        return response()->file(storage_path('/app/public/'.$data->header_img_url));
    }
    public function showthumb($id)
    {
        $data = ProductTour::where('id',$id)->first();
        return response()->file(storage_path('/app/public/'.$data->thumbnail_img_url));
    }

    public function datadiriTour(Request $request) {
        $data = json_decode($request->cookie('QuoteTour'));
        if(!$data)return redirect()->back();
        // dd($data);
        return view('pages.user.datadiri-tour',[
            'room' => $data->room
        ]);
    }

    public static function GenerateBooking($name)
    {
        $pConfig = ProductsConfig::where('nama',$name)->first();
        $lastT = TourBooking::whereDate('created_at', now())->get();
        $theId = count($lastT) + 1;
        return $pConfig->invoice_prefix.date("Ymd").'.BC.'.str_pad($theId, 4, "0", STR_PAD_LEFT);
    }

    public function datasubmit(Request $request) {
        // return $request->all();
        $cookie = json_decode($request->cookie('QuoteTour'));
        $date = $cookie->date;
        $product = $cookie->id;
        $paymentUrl = '';
        $tour = ProductTour::where('id',$product)->first();
        $bookingCode = self::GenerateBooking("Tour");
        $phonenumber = $request->data['cp']['nohp'];
        $email = $request->data['cp']['email'];
        $cpname = explode(' ',$request->data['cp']['nama']);
        if(count($cpname) > 2) {
            $firstName = $cpname[0];
            $middleName = $cpname[1];
            $lastName = "";
            foreach ($cpname as $key => $value) {
                if($key>1){
                    $lastName .= $value.' ';
                }
            }
        }else if(count($cpname) == 2){
            $firstName = $cpname[0];
            $middleName = "";
            $lastName = $cpname[1];
        }else{
            $firstName = $cpname[0];
            $middleName = "";
            $lastName = "";
        }
        $trans = TourBooking::create([
            'user_id' => 0,
            'bookingCode' => $bookingCode,
            'product_tour_id' => $tour->id,
            'product_tour_date_id' => $date,
            'title' => "mrs",
            'firstName' => $firstName,
            'middleName' => $middleName,
            'lastName' => $lastName,
            'email' => $email,
            'phoneNumber' => $phonenumber,
            'payment_url' => $paymentUrl,
            'payment_status' => 0
        ]);
        foreach ($request->data['room'] as $index => $key) {
            // return $key2;
            // $room = TourBookingRoom::create([
                //     'tour_booking_id' => $trans->id,
                //     'name' => "Room ".$key['no_room'],
                //     'extrabed' => $key['extraBed'],
                //     'bedtype' => $key['bedType']
                // ]);
            $paxtype = [];
            foreach ($key['data'] as $key2 => $value) {
                $paxtype[$key2] = $value['paxType'];
            }
            foreach ($key['data'] as $key2) {
                // return $key2;
                $checkuser = Customer::where('guest_name',$key2['nama'])->first();
                if(!$checkuser){
                    $passport = Passport::create([
                        // 'no_passport' => $key2['no_passport'],
                        // 'dob' => date_format($key2['dob'],"Y/m/d")
                        'dob' => date('Y-m-d', strtotime($key2['birth']))
                    ]);
                    try {
                        $customer = Customer::create([
                            'guest_name' => $key2['nama'],
                            'title' => $key2['title'],
                            'passport_id' => $passport->id,
                            'email' => $key2['email'],
                            'phone_number' => $key2['nohp'],
                            'paxtype' => $key2['paxType'],
                        ]);
                    } catch (\Throwable $th) {
                        return $th;
                        //throw $th;
                    }
                }
                $customer = Customer::where('guest_name',$key2['nama'])->first();
                $trans->user_id = $customer->id;
                $trans->save();
                if(in_array('CHD',$paxtype)){
                    $extrabed = "cwb";
                }else{
                    $extrabed = "standard";
                }
                TourPassanger::Create([
                    // 'tour_booking_room_id' => $room->id,
                    'id' => '',
                    'room' => "Room ".$index+1,
                    'extrabed' => $extrabed,
                    'bedtype' => $key['bedType'],
                    'tour_bookings_id' => $trans->id,
                    'customers_id' => $customer->id,
                    'has_visa' => 0 ,
                    'status' => 0
                ]);
            }
        }
        return response()->json($trans,200);
    }
}
