<?php

namespace App\Http\Controllers;

use App\Duffel\DuffelAPI;
use App\Models\Carousel;
use App\Models\Customer;
use App\Models\DisplayBanner;
use App\Models\Passport;
use App\Models\ProductsConfig;
use App\Models\ProductTour;
use App\Models\TourBooking;
use App\Models\TourBookingRoom;
use App\Models\TourPassanger;
use App\Models\User;
use App\Models\UserAdmin;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

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
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('user')->attempt($data)){
            return redirect()->back();
        }else{
            return redirect()->back()->with('pesan','email/password salah');
        }
        if(!$user) return redirect()->back()->with('error','email/password salah');
    }

    public function registerUser(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'nama' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required"|confirmed|min:6',
        // ]);
        $temp = explode(' ',$request->nama);
        if(count($temp) == 1) {
            $firstName = $temp[0];
            $lastName = $temp[0];
        }else if(count($temp) == 2) {
            $firstName = $temp[0];
            $lastName = $temp[1];
        }else if(count($temp) == 3) {
            $firstName = $temp[0];
            $middleName = $temp[1];
            $lastName = $temp[2];
            foreach ($temp as $key2 => $value2) {
                if($key2>2){
                    $lastName = $value2;
                }else{
                    $lastName .= ' '.$value2;
                }
            }
        }else if(count($temp) > 3) {
            $firstName = $temp[0];
            $middleName = $temp[1];
            $lastName = "";
            for ($i=2; $i < count($temp); $i++) {
                if($i == 2){
                    $lastName = $temp[$i];
                }else{
                    $lastName .= ' '.$temp[$i];
                }
            }
        }
        User::create([
            'title' => $request->title,
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back();
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'bail|required',
            'password' => 'bail|required'
        ]);
        $user = UserAdmin::where('username',$request->username)->first();

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::guard('admin')->attempt($data)){
            return redirect('/cms/tour');
        }else{
            return redirect()->back()->with('pesan','email/password salah');
        }
    }
    public function loginAdminPages()
    {
        return view('pages.backoffice.login');
    }

    public function searchFlight(Request $request)
    {
        $currency = DuffelAPI::getCurrency();
        $currentIDR = $currency->idr->rate;
        ($request->has('sort'))?$sort = $request->sort:$sort = "";
        ($request->has('waktu'))?$waktu = $request->waktu:$waktu = "";
        ($request->has('transit'))?$transit = $request->transit:$transit = "";
        // dd($request->all());
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
            $REQUESTdata = [
                'cabin' => $request->class,
                'slices' => [
                    [
                        "departure_date"=> $request->depart,
                        "destination"=> $request->destination,
                        "origin"=> $request->departure,
                        // "departure_date"=> '2023-01-08',
                        // "destination"=> 'DXB',
                        // "origin"=> 'LHR',
                    ],
                    [
                        "departure_date"=> $request->return,
                        "destination"=> $request->departure,
                        "origin"=> $request->destination,
                        // "departure_date"=> '2023-01-08',
                        // "destination"=> 'DXB',
                        // "origin"=> 'LHR',
                    ],
                ],
                'pass' => $pass
            ];
        }else{
            $REQUESTdata = [
                'slices' => [
                    [
                        "departure_date"=> $request->depart,
                        "destination"=> $request->destination,
                        "origin"=> $request->departure,
                    ],
                ],
                'cabin' => $request->class,
                'pass' => $pass
            ];
        }
        // dd($REQUESTdata);
        $day = Carbon::createFromFormat('Y-m-d', $request->depart)->format('l');
        $date = Carbon::createFromFormat('Y-m-d', $request->depart)->format('d-m-Y');
        $res = DuffelAPI::SearchFlight($REQUESTdata);
        $offers = collect($res->data->offers);
        foreach ($offers as $key) {
            $idr = $key->total_amount * $currentIDR;
            $key->total_currency = "IDR";
            $key->total_amount = (int)$idr;
            $temp = Carbon::createFromFormat('Y-m-d H:i:s', str_replace('T',' ',$key->slices[0]->segments[0]->departing_at))->format('Y-m-d H:i:s');
            $key->depart_jam_depart = $temp;
            $key->transit_depart = count($key->slices[0]->segments)-1;
            if(count($key->slices) > 1){
                $temp = Carbon::createFromFormat('Y-m-d H:i:s', str_replace('T',' ',$key->slices[1]->segments[0]->departing_at))->format('Y-m-d H:i:s');
                $key->return_jam_depart = $temp;
                $key->transit_return = count($key->slices[1]->segments)-1;
            }
        }

        if($transit != "" && $waktu != ""){
            $tempwaktu = explode("-",$waktu);
            $start = Carbon::createFromFormat('Y-m-d H:i:s', $request->depart .' '.$tempwaktu[0]);
            $end = Carbon::createFromFormat('Y-m-d H:i:s', $request->depart .' '.$tempwaktu[1]);
            if(in_array('2',$transit)){
                $offers =$offers->whereIn('transit_depart',$transit)->where('transit_depart','>=',2)->whereBetween('depart_jam_depart',[$start,$end]);
            }else{
                $offers =$offers->whereIn('transit_depart',$transit)->whereBetween('depart_jam_depart',[$start,$end]);
            }
        }
        else if($transit != ""){
            if(in_array('2',$transit)){
                $offers =$offers->whereIn('transit_depart',$transit)->where('transit_depart','>',2);
            }else{
                $offers =$offers->whereIn('transit_depart',$transit);
            }
        }
        else if($waktu != "") {
            $tempwaktu = explode("-",$waktu);
            $start = Carbon::createFromFormat('Y-m-d H:i:s', $request->depart .' '.$tempwaktu[0]);
            $end = Carbon::createFromFormat('Y-m-d H:i:s', $request->depart .' '.$tempwaktu[1]);
            $offers =$offers->whereBetween('depart_jam_depart',[$start,$end]);
        }

        if($sort == "lowest-price"){
            $offers = $offers->sortBy('total_amount');
        }
        else if($sort == "depart-earliest-departure"){
            $offers = $offers->sortBy('depart_jam_depart');
        }
        else if($sort == "depart-lastest-departure"){
            $offers = $offers->sortByDesc('depart_jam_depart');
        }
        else if($sort == "return-earliest-departure"){
            $offers = $offers->sortBy('return_jam_depart');
        }
        else if($sort == "return-lastest-departure"){
            $offers = $offers->sortByDesc('return_jam_depart');
        }

        foreach ($res->data->passengers as $key => $value) {
            if($passid == ''){
                $passid = $value->id;
            }else{
                $passid .= ','.$value->id;
            }
        }
        return view('pages.user.ticket',[
            'airport' => $airport->data,
            'data' => $res->data,
            'pass_count' => $request->passanger,
            'cabin' => $request->class,
            'days' => $day.", ".$date,
            'depart_date' => $request->depart,
            'return_date' => ($request->return)?$request->return:"",
            'type' => $request->type,
            'passid' => $passid,
            'offers' => $offers,
            'sort' => $sort,
            'waktu' => $waktu,
            'transit' => $transit,
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
        $display = DisplayBanner::where('enabled',1)->orderBy('index', 'ASC')->get();
        $tour = ProductTour::get();
        $airport = DuffelAPI::getAirport();
        // foreach ($display as $tagg) {
        if ($display) {
            foreach ($display as $diplays) {
                $temp = [];
                $explode = explode(',', $diplays->tags);
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
                $diplays->products = $temp;
            }
        }
        // }
        // dd($display);
        $carousel = Carousel::get();
        return view('pages.user.index',[
            'airport' => $airport->data,
            'product' => $display,
            'carousel' => $carousel
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
