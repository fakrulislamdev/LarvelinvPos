<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class CustomerController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('add_customer');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:customers|max:255',
        'address' => 'required',
        'phone' => 'required|max:13',
        'account_holder' => 'unique:customers|max:255',
        'account_number' => 'unique:customers|max:255',
        'bank_name' => 'unique:customers|max:255',
        'bank_branch' => 'unique:customers|max:255',
        'photo' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;
        $image=$request->file('photo'); 


//image uplaod code
        if ($image) {
            $image_name=time().'_'.$request->email;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $customer=DB::table('customers')
                         ->insert($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully Customer Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.customer')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
    }
    
    //view all employee
    public function AllCustomer()
    {
        $customer=DB::table('customers')->get();
        return view('all_customer')->with('customer',$customer);
    }
    //Delete a single Employee
    public function DeleteCustomer($id)
    {
         $delete=DB::table('customers')
                ->where('id',$id)
                ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('customers')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Customer Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.customer')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }               
    }

    public function EditCustomer($id)
    {
        $cus=DB::table('customers')->where('id',$id)->first();
        return view('edit_customer', compact('cus'));
    }

    public function UpdateCustomer(Request $request ,$id)
    {
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;
        $image=$request->file('photo');

      if ($image) {
       $image_name=time().'_'.$request->email;
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/customer/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('customers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }
    public function ViewCustomer($id)
    {
        $single = DB::table('customers')
                ->where('id',$id)
                ->first();
        return view('view_customer',compact('single'));
    }
}
