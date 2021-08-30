<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livraison;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use  Illuminate\Http\Client\Response;
use GuzzleHttp;
use GuzzleHttp\Client;



class RequestController extends Controller
{
//     public function getAllOrders()
//     {

//         return Http::withBasicAuth('ck_e53c61c53e04fe95cefd9b6ecbd1323e3470b4d6','cs_c737add5943fec2ede120c266c6f9ecbd41973c9')->get('https://nextimes.dz/wp-json/wc-analytics/orders');
//     }

//     public function getOrders()
//     {
        
//        /* $response = Http::withHeaders([ 'headers'  =>  [ 'X-API-ID'  =>  '10095568284364992695'  ,  'X-API-TOKEN'  =>  '24nscPVsMjG9TRf8Ygooz1zq5mw7Jdt1vrpbOI3nKI3LUDcpJeZ5EV2Ql8iXKuxU'] ],[ 'timeout'  =>  120 ])->get('https://api.yalidine.com/v1/wilayas/');
//         return $response; */

//      $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, 'https://api.yalidine.com/v1/parcels/');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


// $headers = array();
// $headers[] = 'X-Api-Id: 10095568284364992695';
// $headers[] = 'X-Api-Token: 24nscPVsMjG9TRf8Ygooz1zq5mw7Jdt1vrpbOI3nKI3LUDcpJeZ5EV2Ql8iXKuxU';
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// $result = curl_exec($ch);
// if (curl_errno($ch)) {
//     echo 'Error:' . curl_error($ch);
// }
// curl_close($ch);
// echo $result;

// }


public function getLivraisons()
{
    
   /* $response = Http::withHeaders([ 'headers'  =>  [ 'X-API-ID'  =>  '10095568284364992695'  ,  'X-API-TOKEN'  =>  '24nscPVsMjG9TRf8Ygooz1zq5mw7Jdt1vrpbOI3nKI3LUDcpJeZ5EV2Ql8iXKuxU'] ],[ 'timeout'  =>  120 ])->get('https://api.yalidine.com/v1/wilayas/');
    return $response; */

 $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.yalidine.com/v1/parcels/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'X-Api-Id: 10095568284364992695';
$headers[] = 'X-Api-Token: 24nscPVsMjG9TRf8Ygooz1zq5mw7Jdt1vrpbOI3nKI3LUDcpJeZ5EV2Ql8iXKuxU';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
echo 'Error:' . curl_error($ch);
}
curl_close($ch);
// echo $result;

$yals = json_decode($result);

foreach($yals as $yal){
    foreach ($yals->data as $rayan){
    $liv = Livraison::firstOrCreate([
    'tracking' =>$rayan->tracking,
    'order_id' => $rayan->order_id,
    'first_name' => $rayan->firstname,
    'family_name' => $rayan->familyname,
    'contact_phone' => $rayan->contact_phone,
    'adress' => $rayan->address,
    'to_wilaya_name' => $rayan->to_wilaya_name,
    'to_commune_name' => $rayan->to_commune_name,
    'product_list' => $rayan->product_list,
    'price' => $rayan->price,
    'delivery_fee' => $rayan->delivery_fee,
    'last_status' => $rayan->last_status,
]);

return $yals;

}}}}