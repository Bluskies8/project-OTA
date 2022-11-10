<?php

namespace App\Duffel;

use Illuminate\Http\Request;


class DuffelAPI
{
    // private static $ClientID = "MCH-0324-1132117023979";
    // private static $SecretKey = "SK-G48ZvEfW9nEOuD1L0Omu";
    private static $Endpoint = "https://api.duffel.com";

    public static function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $time = date('Y-m-d\TH:i:s\Z', time());
        return 'lilacoid'.$randomString.$time;
    }

    // public static function notification($data)
    // {
    //     $notifheader = $data->getallheaders();
    //     $body = $data->input();
    //     $requestId = self::generateRandomString(20);
    //     $requestDate = date('Y-m-d\TH:i:s\Z', time());
    //     $targetPath = "/api/third-party/jokul/payment/notifications";
    //     $digestValue = base64_encode(hash('sha256', json_encode($body), true));
    //     $componentSignature = "Client-Id:" . $notifheader['Client-Id'] . "\n" .
    //     "Request-Id:" . $notifheader['Client-Id'] . "\n" .
    //     "Request-Timestamp:" . $notifheader['Request-Timestamp'] . "\n" .
    //     "Request-Target:$targetPath\n" .
    //     "Digest:" . $digestValue;
    //     $signature = base64_encode(hash_hmac('sha256', $componentSignature, self::$SecretKey, true));

    //     $curl = curl_init(self::$Endpoint.$targetPath);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Client-Id:' . self::$ClientID,
    //         'Request-Id:' . $requestId,
    //         'Request-Timestamp:' . $requestDate,
    //         'Signature:' . "HMACSHA256=" . $signature,
    //     ));
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
    //     $RESPONSE = json_decode(curl_exec($curl));
    //     curl_close($curl);
    //     if ($signature == $notifheader['Signature']) {
    //         // TODO: Process if Signature is Valid
    //         $data = [
    //             'status' => $body->transaction['status'],
    //             'invoice' => $body->order['invoice_number']
    //         ];
    //         return $data;

    //         // TODO: Do update the transaction status based on the `transaction.status`
    //     } else {
    //         // TODO: Response with 400 errors for Invalid Signature
    //         return false;
    //     }
    // }

    public static function getAirport()
    {
        $targetPath = "/air/airports?after=&limit=1000&iata_country_code=ID&before=";
        $curl = curl_init(self::$Endpoint.$targetPath);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer duffel_test_81LkbLZsP9ACTGn6Zb7E1hmSBwyxHywAeFTPkejJm7X',
            'Duffel-Version: beta'
        ));
        $RESPONSE = json_decode(curl_exec($curl));
        curl_close($curl);
        return $RESPONSE;
    }
    public static function getCurrency()
    {
        // $targetPath = "/air/airports?after=&limit=1000&iata_country_code=ID&before=";
        $curl = curl_init("http://www.floatrates.com/daily/usd.json");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        //     'Authorization: Bearer duffel_test_81LkbLZsP9ACTGn6Zb7E1hmSBwyxHywAeFTPkejJm7X',
        //     'Duffel-Version: beta'
        // ));
        $RESPONSE = json_decode(curl_exec($curl));
        curl_close($curl);
        return $RESPONSE;
    }
    public static function getOffer($id)
    {
        $targetPath = "/air/offers/".$id;
        $curl = curl_init(self::$Endpoint.$targetPath);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer duffel_test_81LkbLZsP9ACTGn6Zb7E1hmSBwyxHywAeFTPkejJm7X',
            'Duffel-Version: beta'
        ));
        $RESPONSE = json_decode(curl_exec($curl));
        curl_close($curl);
        return $RESPONSE;
    }
    public static function getOrder($id)
    {
        $targetPath = "/air/orders/".$id;
        $curl = curl_init(self::$Endpoint.$targetPath);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer duffel_test_81LkbLZsP9ACTGn6Zb7E1hmSBwyxHywAeFTPkejJm7X',
            'Duffel-Version: beta'
        ));
        $RESPONSE = json_decode(curl_exec($curl));
        curl_close($curl);
        return $RESPONSE;
    }

    public static function SearchFlight($data)
    {
        // $body = $REQUEST['data'];
        // dd($data);
        $targetPath = "/air/offer_requests";
        $curl = curl_init(self::$Endpoint.$targetPath);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer duffel_test_81LkbLZsP9ACTGn6Zb7E1hmSBwyxHywAeFTPkejJm7X',
            'Duffel-Version: beta'
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
            "data"=> [
                "cabin_class"=> $data['cabin'],
                "slices"=> $data['slices'],
                "passengers" => $data['pass'],
            ]
        ]));
        $RESPONSE = json_decode(curl_exec($curl));
        // dd($RESPONSE->data->offers[0]);
        curl_close($curl);
        return $RESPONSE;
    }

    public static function SearchOrder(){
        $targetPath = "/air/orders/";
        $curl = curl_init(self::$Endpoint.$targetPath);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer duffel_test_81LkbLZsP9ACTGn6Zb7E1hmSBwyxHywAeFTPkejJm7X',
            'Duffel-Version: beta'
        ));
        $RESPONSE = json_decode(curl_exec($curl));
        curl_close($curl);
        return $RESPONSE;
    }
    public static function DOBook($data){
        $targetPath = "/air/orders";
        $curl = curl_init(self::$Endpoint.$targetPath);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer duffel_test_81LkbLZsP9ACTGn6Zb7E1hmSBwyxHywAeFTPkejJm7X',
            'Duffel-Version: beta'
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
            "data"=> [
                "type"=>"instant",
                "selected_offers"=> [
                    $data['selected_offer']
                ],
                "payments"=> [
                    [
                        'type' => "balance",
                        'currency' => $data['payment']['currency'],
                        'amount' => $data['payment']['amount'],
                    ]
                ],
                "passengers"=>
                // [
                    $data['passanger']
                    // [
                    //     "type"=> $data['passanger'][0]['type'],
                    //     "title"=> $data['passanger'][0]['title'],
                    //     "phone_number"=> $data['passanger'][0]['phone_number'],
                    //     "id"=> $data['passanger'][0]['id'],
                    //     "given_name"=> $data['passanger'][0]['given_name'],
                    //     "gender"=> $data['passanger'][0]['gender'],
                    //     "family_name"=> $data['passanger'][0]['family_name'],
                    //     "email"=> $data['passanger'][0]['email'],
                    //     "born_on"=> $data['passanger'][0]['born_on']
                    // ]
                // ]
            ]
        ]));
        $RESPONSE = json_decode(curl_exec($curl));
        curl_close($curl);
        return $RESPONSE;
    }

    // public static function doPayment($req)
    // {
    //     $group = UserFlightBookGroup::where('invoice',$req->invoice)->first();
    //     // dd($group->UserFlightBook());
    //     $userflight = UserFlightBook::where('group_id',$group->id)->first();
    //     // search transbyid
    //     $_send = GarudaHelper::SSGetBookByTransactionId(['transactionId'=>$userflight->transaction_id]);
    //     $_response = GarudaAPI::GetBookByTransactionId($_send);
    //     $_result = GarudaHelper::SRGetBookByTransactionId($_response);
    //     // $response['book_details'] = $_result;
    //     $data = [];
    //     $qtt = 0;
    //     foreach ($_result->bookingsSummary[0]->passengers as $key) {
    //         $qtt += 1;
    //     }
    //     foreach ($_result->bookingsSummary[0]->flightJourneys as $key) {
    //         $data = [
    //             'name' => $key->departureAirport->city." to ".$key->arrivalAirport->city,
    //             'quantity' => $qtt
    //         ];
    //     }
    //     $user = User::find($group->order_by)->first();
    //     $time = date('Y-m-d\TH:i:s\Z', time());
    //     $clientId = self::$ClientID;
    //     // dd($time);
    //     $requestId = 'lilacoid'.self::generateRandomString(20).$time;
    //     $requestDate = $time ;
    //     $targetPath = "/checkout/v1/payment";
    //     $secretKey = self::$SecretKey;
    //     $requestBody = array (
    //         'order' => array (
    //             "amount"=> $_result->total,
    //             "invoice_number"=> $req->invoice,
    //             "line_items"=> array(
    //                 $data
    //             ),
    //             "currency"=> "IDR",
    //             "callback_url"=> "https://merchant.com/return-url",
    //         ),
    //         'payment' => array (
    //             "payment_method_types"=> [
    //                 "VIRTUAL_ACCOUNT_BANK_MANDIRI",
    //                 "VIRTUAL_ACCOUNT_BANK_SYARIAH_MANDIRI",
    //                 "VIRTUAL_ACCOUNT_DOKU",
    //                 "VIRTUAL_ACCOUNT_BRI",
    //                 "VIRTUAL_ACCOUNT_BCA",
    //                 "CREDIT_CARD",
    //                 "DIRECT_DEBIT_BRI",
    //                 "ONLINE_TO_OFFLINE_ALFA"
    //             ],
    //             'payment_due_date' => 60,
    //         ),
    //         'customer' => array (
    //             "id"=> $user->id,
    //             "name"=> $user->first_name.' '.$user->middle_name.' '.$user->last_name,
    //             "email"=> $user->email,
    //             "phone"=> $user->phone_number,
    //             "address"=> "",
    //             "country"=> "ID"
    //         ),
    //     );
    //     $digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));
    //     $componentSignature = "Client-Id:" . $clientId . "\n" .
    //     "Request-Id:" . $requestId . "\n" .
    //     "Request-Timestamp:" . $requestDate . "\n" .
    //     "Request-Target:" . $targetPath . "\n" .
    //     "Digest:" . $digestValue;

    //     $signature = base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true));
    //     // dd(json_encode($requestBody));
    //     $response = [
    //         'endpoint' => self::$Endpoint,
    //         'clientId' =>$clientId,
    //         'requestId' => $requestId,
    //         'requestDate' => $requestDate,
    //         'targetPath' => $targetPath,
    //         'digestValue' => $digestValue,
    //         'signature' => $signature,
    //         'requestBody' => $requestBody
    //     ];
    //     return response()->json($response);
    // }
}

