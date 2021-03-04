<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Facades\Datatables;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use DB;

class PosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $product=DB:: table('products')
                ->join('categories','products.cat_id','categories.id')
                ->select('categories.cat_name','products.*')
                ->get();
        $customer=Customer:: all();
        $cat=DB:: table('categories')->get();
        return view('pos',compact('product','customer','cat'));
    }
    public function PendingOrder(){
        $pending=DB::table('orders')->join('customers','orders.customer_id','customers.id')
                 ->select('customers.name','orders.*')->where('order_status','pending')
                 ->get();
        return view('pending_order',compact('pending'));
    }
    public function ViewOrder($id)
    {
        $order=DB::table('orders')->join('customers','orders.customer_id','customers.id')
                    ->select('customers.*','orders.*')
                   ->where('orders.id',$id)
                   ->first();
        $order_details=DB::table('orderdetails')
                    ->join('products','orderdetails.product_id','products.id')
                    ->select('orderdetails.*','products.product_name','products.product_code')
                    ->where('order_id',$id)->get();
        return view('order_confirm',compact('order','order_details'));
    }

    public function PosDone($id){
        DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
        return redirect('/pending_order')->with('success', 'Successfully Order Confirmed & Product Delivered.'); 
    }

    public function SuccessOrder(){
        $success=DB::table('orders')->join('customers','orders.customer_id','customers.id')
                 ->select('customers.name','orders.*')->where('order_status','success')
                 ->get();
        return view('success_order',compact('success'));
    }
    
}
