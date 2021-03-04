<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('add_product');
    }

    public function view_product() {
        $data = Product::all();
        return view('all_product', compact('data'));
    }

    public function store_product(Request $r) {
        
        $r->validate([
            
            'product_name'=> 'required',
            'cat_id'=> 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sup_id'=> 'required',
            'product_code'=> 'required',
            'buy_date'=> 'required',
            'expire_date'=> 'required',
            'buying_price'=> 'required',
            'selling_price'=> 'required'
        ]);
            $file=$r->file('photo');
            $file->move('upload',time().'_'.$file->getClientOriginalName());
            $d=array(
            'product_name' => $r->product_name,
            'cat_id' => $r->cat_id,
            'sup_id' => $r->sup_id,
            'photo' => time().'_'.$file->getClientOriginalName(),
            'product_code' => $r->product_code,
            'product_garage'=> $r->product_garage,
            'product_route'=> $r->product_route,
            'buy_date' => $r->buy_date,
            'expire_date' => $r->expire_date,
            'buying_price' => $r->buying_price,
            'selling_price' => $r->selling_price
        );

            Product::create($d);
            return redirect('/all_product')->with('success', 'Product info save successfully');
    }

    public function update_product(Request $r) {
        $r->validate([
            'product_name'=> 'required',
            'cat_id'=> 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sup_id'=> 'required',
            'product_code'=> 'required',
            'buy_date'=> 'required',
            'expire_date'=> 'required',
            'buying_price'=> 'required',
            'selling_price'=> 'required'
        ]);
            $file=$r->file('photo');
            $file->move('upload',time().'_'.$file->getClientOriginalName());
            $d=array(
            'product_name' => $r->product_name,
            'cat_id' => $r->cat_id,
            'sup_id' => $r->sup_id,
            'photo' => time().'_'.$file->getClientOriginalName(),
            'product_code' => $r->product_code,
            'product_garage'=> $r->product_garage,
            'product_route'=> $r->product_route,
            'buy_date' => $r->buy_date,
            'expire_date' => $r->expire_date,
            'buying_price' => $r->buying_price,
            'selling_price' => $r->selling_price
        );
        Product::where('id', $r->id)->update($d);
        return redirect('/all_product')->with('success', 'Product updated successfully');
    }

    public function delete_product($id) {
        Product::where('id', $id)->delete();
        return redirect('/all_product')->with('success', 'Product deleted successfully');
    }

    public function edit_product($id) {
        $data = Product::find($id);
        return view('edit_product', compact('data'));
    }
    
    //Product Import and Export here......
    
    public function import_product(){
        return view('import_product');
    }
    public function export() 
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }
    public function import(Request $r) 
    {
        Excel::import(new ProductImport,$r->file('import_file'));
        return redirect('/all_product')->with('success', 'Product Import successfully');
    }

    public function single_product($id){

        $prod=DB::table('products')
        ->join('categories','products.cat_id','categories.id')
        ->join('suppliers','products.sup_id','suppliers.id')
        ->select('categories.cat_name','products.*','suppliers.name')
        ->where('products.id',$id)
        ->first();
        return view('single_product',compact('prod',$prod));
    }

    public function TotalSales(){
        $salse = DB::table('orderdetails')
                ->join('products','orderdetails.product_id','products.id')
                ->join('orders','orderdetails.order_id','orders.id')
                ->select('products.product_name','products.selling_price','orderdetails.*','orders.order_date')->get();
                $total=DB::table("orderdetails")->get()->sum("total");
        return view('total_sales', compact('salse','total'));
    }
}

