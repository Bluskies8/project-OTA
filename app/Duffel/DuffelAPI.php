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

    public static function cancelOrder($data)
    {
        $targetPath = "/air/order_cancellations";
        $curl = curl_init(self::$Endpoint.$targetPath);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer duffel_test_81LkbLZsP9ACTGn6Zb7E1hmSBwyxHywAeFTPkejJm7X',
            'Duffel-Version: beta'
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
            "data"=> [
                "order_id"=> $data,
            ]
        ]));
        $RESPONSE = json_decode(curl_exec($curl));
        curl_close($curl);
        return $RESPONSE;
    }

    public static function confirmCancel($id)
    {
        $targetPath = "/air/order_cancellations/".$id."/actions/confirm";
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

}

