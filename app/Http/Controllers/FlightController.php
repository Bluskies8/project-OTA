<?php

namespace App\Http\Controllers;

use App\Duffel\DuffelAPI;
use App\Http\PaymentAPI\JokulAPI;
use App\Models\Customer;
use App\Models\kodeReferal;
use App\Models\kodeReferalDetail;
use App\Models\Passport;
use App\Models\ProductsConfig;
use App\Models\UserFlightBookPassRecord;
use App\Models\UserSingleFlightBook;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    public static function GenerateSingleFlightInvoice($name)
    {
        $pConfig = ProductsConfig::where('nama',$name)->first();
        $lastT = UserSingleFlightBook::whereDate('created_at', now())->get();
        $theId = count($lastT) + 1;
        return $pConfig->invoice_prefix.date("Ymd").'.BC.'.str_pad($theId, 4, "0", STR_PAD_LEFT);
    }

    public function datadiri(Request $request) {
        $data = json_decode($request->cookie('dataFlight1'));
        $flight = DuffelAPI::getOffer($data->flight1)->data;
        // dd($flight);
        if(!$data)return redirect()->back();
        return view('pages.user.datadiri-flight',[
            'count' => $data->pass_count,
            'flight' => $flight,
            'cabin' => $data->cabin,
            'depart_date' => $data->depart_date,
            'return_date' => ($data->return_date)?$data->return_date:""
        ]);
    }

    public function datasubmit(Request $req)
    {
        $data = json_decode($req->cookie('dataFlight1'));
        $kode = "";
        if($req->data['referal']){
            $kode = kodeReferal::where('kode',$req->data['referal'])->where('tipe','flight')->first();
            if(!$kode){
                return "kode not found";
            }
        }
        $currency = DuffelAPI::getCurrency();
        $currentIDR = $currency->idr->rate;
        $ONEWAY = $data->type;
        $reqDepartingAirline = $data->flight1;
        $depart = $data->departure;
        $return = $data->destination;
        $route = $depart.'-'.$return;
        // return $route;

        $newBook = [
            "status" => false,
            "order_by" => Auth::guard('user')->user()->id,
            "book_date" => now(),
            'book_status' => 1,
            'payment_status' => 0,
            'airline_id' => "",
            'city_route' => $route
        ];
        // return $req->data['passanger'];
        $passid = explode(',',$data->passid1);
        foreach ($req->data['passanger'] as $key => $value) {
            $temp = explode(' ',$value['nama']);
            if(count($temp) > 1) {
                $firstName = $temp[0];
                $lastName = "";
                foreach ($temp as $key2 => $value2) {
                    if($key2>0){
                        $lastName = $value2;
                    }else{
                        $lastName .= ' '.$value2;
                    }
                }
            }else{
                $firstName = $temp[0];
                $lastName = $temp[0];
            }
            if($value['title'] == 'mr'){
                $gender = "m";
            }else{
                $gender = "f";
            }
            $passanger[]= [
                'type' => 'adult',
                "title"=> $value['title'],
                "phone_number"=> "+442080160509",
                "id"=> $passid[$key],
                "given_name"=> $firstName,
                "gender"=> $gender,
                "family_name"=> $lastName,
                "email"=> $value['email'],
                "born_on"=> $value['birth']
            ];
        }
        $offer = DuffelAPI::getOffer($data->flight1);
        $data = [
            "selected_offer" => $data->flight1,
            "payment" => [
                'type' => "balance",
                'currency' => $offer->data->total_currency,
                'amount' => $offer->data->total_amount
            ],
            "passanger" =>$passanger
        ];
        // return $data;
        $_response = DuffelAPI::DOBook($data);
        if(isset($_response->errors)){
            return $_response->errors;
        }
        $response =  $_response->data;
        if($req->data['referal']){
            kodeReferalDetail::create([
                'user_id' => Auth::guard('user')->user()->id,
                'referal_id' => $kode->id
            ]);
            $limit = $kode->limit-1;
            $kode->limit = $limit;
            $kode->save();
            $diskon = (int)($kode->discount * $response->total_amount * $currentIDR / 100);
            $total = (int)($response->total_amount * $currentIDR) - $diskon;
        }else{
            $total = (int)($response->total_amount * $currentIDR);
        }
        $newBook["status"] = true;
        $newBook["transactionId"] = $response->id;
        $newBook["booking_code"] = $response->booking_reference;
        $newBook["nta"] = $response->base_amount * $currentIDR;
        $newBook["total"] = $total;
        // $newBook["total"] = "1000000";
        // return $newBook;
        $checkuser = Customer::where('guest_name',$req->data['cp']['nama'])->first();
        if(!$checkuser){
            $passport = Passport::create([
                'dob' => date('Y-m-d', strtotime($req->data['cp']['birth']))
            ]);
            try {
                $customer = Customer::create([
                    'guest_name' => $req->data['cp']['nama'],
                    'title' => $req->data['cp']['title'],
                    'passport_id' => $passport->id,
                    'email' => $req->data['cp']['email'],
                    'phone_number' => '+62'.$req->data['cp']['nohp'],
                    'paxtype' => 'ADT',
                ]);
            } catch (\Throwable $th) {
                return $th;
                //throw $th;
            }
        }
        // $customer = Customer::where('guest_name',$req->data['cp']['nama'])->first();
        $newBook['order_by'] = Auth::guard('user')->user()->id;
        if ($newBook['status']) {
            $passRecords = [];
            foreach ($req->data['passanger'] as $value) {
                $passRecords[] = [
                    'paxType' => "ADT",
                    'title' => $value['title'],
                    'first_name' => $firstName,
                    'middle_name' => "",
                    'last_name' => $lastName,
                    'passport' => "",
                    'DOB' => $value['birth'],
                    'nik' => "",
                ];
            }
            $invoiceId = self::GenerateSingleFlightInvoice("Flight");
            $newBook["invoice"] = $invoiceId;
            unset($newBook["status"]);
            // $nama = "Lila Flight Book GA-(bs->booking code)-(bs->invoice number) invoice db kita"
            $datajokul['order']['line_items'] = [
                "name" => "Lila Flight Book ".$invoiceId,
                "price" => $total,
                "quantity" => 1
            ];
            // $due_time = date_diff(now(), new DateTime("2022-10-29 06:00:00"));
            // return $due_time->i;
            $datajokul['payment']['payment_due_date'] = 60;

            $datajokul['order'] = [
                "amount" => $newBook['total'],
                "invoice_number" => $invoiceId,
                "currency" => "IDR"
            ];
            $datajokul['customer'] = [
                "id" => Auth::guard('user')->user()->id,
                "name" => Auth::guard('user')->user()->first_name. ' '. Auth::guard('user')->user()->middle_name. ' '. Auth::guard('user')->user()->last_name,
                "email" => Auth::guard('user')->user()->email,
                "phone" => Auth::guard('user')->user()->phone_number
            ];
            $datajokul['callback_url'] = "/flight/checkout/$invoiceId";
            $JokulResponse = JokulAPI::DoJokulPayment($datajokul);
            if($JokulResponse->message[0] == "SUCCESS"){
                $newBook['payment_url'] = $JokulResponse->response->payment->url;
            }
            UserSingleFlightBook::create($newBook);

            $latestBook = UserSingleFlightBook::latest()->first();
            foreach ($passRecords as $rec) {
                $rec['user_flight_book_id'] = $latestBook->id;
                $rec['type'] = 1;
                UserFlightBookPassRecord::create($rec);
            }
            // $response['newInvoice'] = $latestBook->invoice;
            // $response['payment_url'] = $latestBook->payment_url;
            // $response['book_details'] = $_response;
            return $latestBook->payment_url;
        }

        // $response['book_details'] = $_response;
        // $response['message'] = $_response->errorsB['message'];
        // return response()->json($response, 400);

        // $jokulres = Jokul::doPayment($doku);
        // $response['book_details'] = $_response;
        // $response['payment'] = $jokulres;

        // $doku = [
        //     'invoice' => 'INV-'.date("YmdHis"),
        // ];
        // $jokulres = Jokul::doPayment($doku);
        // $response['payment'] = $jokulres;
    }
    public function cancel($id)
    {
        $data = DuffelAPI::cancelOrder($id);
        $rescancel = DuffelAPI::confirmCancel($data->data->id);
        return $rescancel;
    }
}
