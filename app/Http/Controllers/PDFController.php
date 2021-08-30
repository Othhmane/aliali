<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;
use DB;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $orders = DB::select('select * from orders');
        return view('myPDF',['orders'=>$orders]);


    }


    public function generatePDF(Order $id)
    {

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            
        ];
          
        $pdf = PDF::loadView('myPDF', compact('id'));
    
        return $pdf->download('itsolutionstuff.pdf');
    }
}