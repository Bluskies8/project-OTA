<?php

namespace App\Http\Controllers;

use App\Duffel\DuffelAPI;
use App\Http\PaymentAPI\JokulAPI;
use App\Models\AdminRole;
use App\Models\country;
use App\Models\Customer;
use App\Models\GlobalTransaction;
use App\Models\ProductsConfig;
use App\Models\ProductTour;
use App\Models\ProductTourDate;
use App\Models\Supplier;
use App\Models\Tag;
use App\Models\TourBooking;
use App\Models\TourPassanger;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\UserSingleFlightBook;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackofficeController extends Controller
{
    public static function GenerateInvoice($name)
    {
        $pConfig = ProductsConfig::where('nama',$name)->first();
        $lastT = GlobalTransaction::whereDate('created_at', now())->get();
        $theId = count($lastT) + 1;
        return $pConfig->invoice_prefix.date("Ymd").'.IV.'.str_pad($theId, 4, "0", STR_PAD_LEFT);
    }
    public function showAlltour()
    {
        $data = ProductTour::get();
        return view('pages.backoffice.tour',[
            'data' => $data,
            'tag' => Tag::get(),
            'country' => country::get(),
            'supplier' => Supplier::get(),
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('adminlogin');
    }

    public function Customers()
    {
        $data = Customer::get();
        foreach ($data as $key) {
            if($key->paxtype == "ADT"){
                $key->paxtype = "Adult";
            }else if($key->paxtype == "CHD"){
                $key->paxtype = "Child";
            }
        }
        return view('pages.backoffice.customers',compact('data'));
    }

    public function Supplier()
    {
        $data = Supplier::get();
        return view('pages.backoffice.master_suplier',[
            'data' => $data,
        ]);
    }

    public function Tag()
    {
        $data = Tag::get();
        return view('pages.backoffice.master_tag',[
            'data' => $data,
        ]);
    }

    public function adminRole()
    {
        $data = AdminRole::get();
        return view('pages.backoffice.admin_role',[
            'data' => $data,
        ]);
    }
    public function adminAccount()
    {
        $data = UserAdmin::with('role')->get();
        $role = AdminRole::get();
        return view('pages.backoffice.admin_account',[
            'data' => $data,
            'role' => $role
        ]);
    }
    public function Tour()
    {
        $tour = ProductTour::get();
        return view('pages.backoffice.report_tour_booking',[
            'tour' => $tour
        ]);
    }

    public function TourDate($id)
    {
        $data = ProductTourDate::where('tour_id',$id)->get();
        return $data;
    }
    public function passanger($tour,$date)
    {
        $data = TourBooking::with('customer')->where('product_tour_id',$tour)->where('product_tour_date_id',$date)->get();
        foreach ($data as $key) {
            $temp = TourPassanger::where('tour_bookings_id',$key->id)->count();
            $key->total = $temp * $key->tour->downpayment;

            if($key->payment_status == 0)$key->payment_status = "Underpaid";
            if($key->payment_status == 2)$key->payment_status = "Unpaid";
            if($key->payment_status == 1)$key->payment_status = "PaidInFull";
        }
        return $data;
    }

    public function generatePaymentLink($id)
    {
        $data = TourBooking::with('customer','tour')->find($id);
        $pConfig = ProductsConfig::where('invoice_prefix',substr($data->bookingCode,0,3))->first();
        if($pConfig->id == 4){
            $bookings = TourBooking::where('bookingCode',$data->bookingCode)->first();
            $tour = ProductTour::where('id',$bookings->product_tour_id)->first();
            $dates = ProductTourDate::where('id',$bookings->product_tour_date_id)->first();
        }
        $invoiceId = self::GenerateInvoice($pConfig->nama);
        $count = TourPassanger::where('tour_bookings_id',$bookings->id)->count();

        $dateprefix = explode(',',$pConfig->payment_due_time);
        if($dateprefix[3] == 'bh'){
            $temp = date('Y-m-d H:i:s', strtotime($dates->date_start . ' -'.$dateprefix[0].' days -'.$dateprefix[1].' hours -'.$dateprefix[2].' minutes'));
            $due_time = date_diff(now(), new DateTime($temp));
        }else if($dateprefix[3] == 'ad'){
            $temp = date('Y-m-d H:i:s', strtotime(\Carbon\Carbon::now() . ' +'.$dateprefix[0].' days +'.$dateprefix[1].' hours +'.$dateprefix[2].' minutes'));
            $due_time = date_diff(now(), new DateTime($temp));
        }
        $finalTime = $due_time->d*24*60 + $due_time->h*60 + $due_time->i;
        $total = $count * $data->tour->downpayment;
        if($data->middleName != ""){
            $nama = $data->firstName.' '.$data->middleName.' '.$data->lastName;
        }else{
            $nama = $data->firstName.' '.$data->lastName;
        }
        // return $total;

        // $due_time = date_diff(now(), new DateTime("2022-10-29 06:00:00"));
        // return $due_time->i;
        $datajokul['payment']['payment_due_date'] = $finalTime;

        $datajokul['order']['line_items'] = [
            "name" => "Lila Flight Book ".$data->bookingCode,
            "price" => $tour->downpayment,
            "quantity" => $count
        ];
        $datajokul['order'] = [
            "amount" => $total,
            "invoice_number" => $data->bookingCode,
            "currency" => "IDR"
        ];
        $datajokul['customer'] = [
            "id" => $data->user_id,
            "name" => $nama,
            "email" => $data->email,
            "phone" => $data->phoneNumber
        ];
        $datajokul['callback_url'] = "/tour/checkout/$invoiceId";
        $JokulResponse = JokulAPI::DoJokulPayment($datajokul);

        // return $JokulResponse;
        if($JokulResponse->message[0] == "SUCCESS"){
            //payment status
            // 0. Unpaid
            // 1. Payment successful
            $paymentUrl = $JokulResponse->response->payment->url;
            $data->payment_url = $paymentUrl;
            $data->save();
            GlobalTransaction::create([
                'id' => '',
                'invoice' => $invoiceId,
                'bookingCode' => $data->bookingCode,
                'payment_status' => 0,
                'payment_url' => $paymentUrl,
            ]);
            return $paymentUrl;
        }else{
            return $JokulResponse->message;
        }
    }

    public function detailBooking($id)
    {
        $data = TourBooking::with('detail.customer')->where('BookingCode',$id)->first();
        $room = [];
        $temp = TourPassanger::where('tour_bookings_id',$data->id)->distinct()->get(['room']);
        foreach ($temp as $rooms) {
            $t = TourPassanger::with('customer.passport')->where('tour_bookings_id',$data->id)->where('room',$rooms->room)->get();
            // dd($t);
            $troom = [];
            foreach ($t as $key) {
                if($key->customer->paxtype == "CHD"){
                    $type = "Child";
                }else{
                    $type = "Adult";
                }
                $troom[] = [
                    'id' => $key->customer->id,
                    'name' =>$key->customer->guest_name,
                    'title' => $key->customer->title,
                    'phone' => $key->customer->phone_number,
                    'type' => $type,
                    'nik' => $key->customer->nik,
                    'dob' => $key->customer->passport->dob,
                    'no_passport' => $key->customer->passport->no_passport
                ];
            }
            $room[] = $troom;
        }
        $tour = ProductTour::find($data->product_tour_id);
        $tour->header_img_url = env('APP_URL').'/tour/imgh/'.$tour->id;
        $tour->thumbnail_img_url = env('APP_URL').'/tour/imgt/'.$tour->id;
        return view('pages.backoffice.detailbookingtour',[
            'data' => $room,
            'tour' => $tour
        ]);
    }
    public function updateTourPassanger(Request $request,$id)
    {
        // dd($request->DOB);
        $pass = TourPassanger::with('customer.passport')->where('id',$id)->first();
        $pass->customer->guest_name = $request->name;
        $pass->customer->nik = $request->nik;
        $pass->customer->paxtype = $request->tipe;
        $pass->customer->phone_number = $request->phone;
        $pass->customer->save();
        if($request->no_passport!=null)$pass->customer->passport->no_passport = $request->no_passport;
        if($request->DOB!=null)$pass->customer->passport->dob = $request->DOB;
        $pass->customer->passport->save();
        return redirect()->back();
    }
    public function FlightTrans()
    {
        //bookingStatus : "hold" => 1,"Expired" => 2, "Cancelled" => 3, "Confirmed" => 4
        //paymentStatus : "Underpaid" (for Hold and Cancelled) 0, "Unpaid" (for Expired) 2, "PaidInFull" (for Confirmed) 1
        $data = UserSingleFlightBook::with('customer')->get();
        foreach ($data as $key) {
            if($key->book_status == 1)$key->book_status = 'Hold';
            if($key->book_status == 2)$key->book_status = 'Expired';
            if($key->book_status == 3)$key->book_status = 'Canceled';
            if($key->book_status == 4)$key->book_status = 'Confirmed';

            if($key->payment_status == 0)$key->payment_status = "Underpaid";
            if($key->payment_status == 2)$key->payment_status = "Unpaid";
            if($key->payment_status == 1)$key->payment_status = "PaidInFull";
        }
        // dd($data);
        return view('pages.backoffice.flight_user',[
            'data' => $data,
        ]);
    }
    public function user(Request $request)
    {
        $data = User::get();
        return view('pages.backoffice.userReport',compact('data'));
    }
    public function history($id)
    {
        $user = User::where('id',$id)->first();
        $tour = TourBooking::with('tour')->where('user_id',$id)->get();
        foreach ($tour as $key ) {
            $count = TourPassanger::where('tour_bookings_id',$key->id)->count();
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $key->created_at)->format('d M Y');
            $key->trans_date = $date;
            $key->biaya = $key->tour->downpayment * $count;
        }
        $flight = UserSingleFlightBook::where('order_by',$id)->get();

        foreach ($flight as $key) {
            $res = DuffelAPI::getOrder($key->transactionId);
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $key->created_at)->format('d M Y');
            $key->trans_date = $date;
            $key->detail = $res->data;
            $key->cabin = $key->detail->slices[0]->segments[0]->passengers[0]->cabin_class;
            // dd($key->detail->slices[0]->segments[0]->passengers[0]->cabin_class);
        }
        return view('pages.backoffice.history',[
            'tour' => $tour,
            'flight' => $flight,
            'user' => $user
        ]);
    }

    public function payment(Request $request)
    {
        // return $request->all();
        if($request->transaction['status'] == "SUCCESS"){
            if(substr($request->order['invoice_number'],0,3)== "TUR"){
                $data = TourBooking::where('bookingCode',$request->order['invoice_number'])->first();
                $data->payment_status = 1;
                $data->save();
            }else if(substr($request->order['invoice_number'],0,3)== "FGH"){
                $data = UserSingleFlightBook::where('invoice',$request->order['invoice_number'])->first();
                $data->payment_status = 1;
                $data->book_status = 4;
                $data->save();
            }
        }
    }
}
