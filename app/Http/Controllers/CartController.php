<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        
    }
    public function index(Request $r) {
        $r->validate([
            'id'=> 'required',
            'name'=> 'required',
            'qty'=> 'required',
            'price'=> 'required'
        ]);
        $data['id']=$r->id;
        $data['name']=$r->name;
        $data['qty']=$r->qty;
        $data['price']=$r->price;
        $content=Cart::add($data);
        return redirect()->back()->with('success', 'Add to Cart Successfully');
    }
   public function cart_update(Request $r,$rowId){
       $qty=$r->qty;
       Cart::update($rowId, $qty);
       return redirect()->back()->with('success', 'Updated Successfully');
   } 
   public function cart_remove($rowId){
       Cart::remove($rowId);
       return redirect()->back()->with('danger', 'Deleted Successfully');
   }

   public function create_invoice(Request $r){
    $r->validate([
            'cus_id'=> 'required'
          ],
          [ 
            'cus_id.required'=>'Select Customer field',
        ]);
      $cus_id=$r->cus_id;
      $customer=DB::table('customers')->where('id', $cus_id)->first();
      $contents=Cart::content();
    return view('invoice', compact('customer','contents'));
   }
   public function FinalInvoice(Request $request){
    $request->validate([
            'payment_status'=> 'required'
        ]);
    $data=array();
    $data['payment_status']=$request->payment_status;
    $data['pay']=$request->pay;
    $data['due']=$request->due;
    $data['customer_id']=$request->customer_id;
    $data['order_date']=$request->order_date;
    $data['order_status']=$request->order_status;
    $data['total_products']=$request->total_products;
    $data['sub_total']=$request->sub_total;
    $data['vat']=$request->vat;
    $data['total']=$request->total;
    
    $order_id=DB::table('orders')->insertGetId($data);
    $content=Cart::content();
    $odata=array();
    foreach($content as $v){
      $odata['order_id']=$order_id;
      $odata['product_id']=$v->id;
      $odata['qty']=$v->qty;
      $odata['unitcost']=$v->price;
      $odata['total']=$v->total;

      $insert=DB::table('orderdetails')->insert($odata);
    }
    Cart::destroy();
    return redirect('/pos')->with('success', 'Inserted Invoice Successfully'); 
   }
}
