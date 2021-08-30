<?php



namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use  Illuminate\Http\Client\Response;
use GuzzleHttp;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::select('select * from orders');
        return view('commandes',['orders'=>$orders]);


    }

    // public function show(Request $request)
    // {
    //     $response = Http::withBasicAuth('ck_e53c61c53e04fe95cefd9b6ecbd1323e3470b4d6','cs_c737add5943fec2ede120c266c6f9ecbd41973c9')->get('https://nextimes.dz/wp-json/wc-analytics/orders');
    //     $anims = json_decode($response->body());
    //     return view('dashboard',["anims"=>$anims]);

    // }
    public function fetch()
    {
        $response = Http::withBasicAuth('ck_082f00e662d2a92d021ee27fa3328654ab530939','cs_115a31f136d23ad2b9085408da72986c53dce480')->get('https://elboutiqa.com/wp-json/wc-analytics/orders?per_page=100');
        $anims = json_decode($response->body());
        foreach($anims as $anim){
            $order =  Order::firstOrCreate([
                'number' => $anim->number,
                'first_name' => $anim->billing->first_name,
                'last_name' => $anim->billing->last_name,
                'total_formatted' => $anim->total_formatted,               
                'payment_method_title' => $anim->payment_method_title,
                'phone' => $anim->billing->phone,
                'email' => $anim->billing->email,
                'address_1' => $anim->billing->address_1,
                'address_2' => $anim->billing->address_2,
                'city' => $anim->billing->city,
            ]);
            


    //         // $order->order = $anim->order;
    //         $order->number = $anim->number;
    //         $order->first_name = $anim->billing->first_name;
    //         $order->last_name = $anim->billing->last_name;
    //         $order->total_formatted = $anim->total_formatted;
    //         $order->payment_method_title = $anim->payment_method_title;
    //         $order->phone = $anim->billing->phone;
    //         $order->email = $anim->billing->email;
    //         $order->address_1 = $anim->billing->address_1;
    //         $order->address_2 = $anim->billing->address_2;
    //         $order->city = $anim->billing->city;
    //         $order->save();
    }
    return' XXXXXXXXXX';
    }

    public function show(Order $id)
    {
    return view('show', compact('id'));     
}

    




}
