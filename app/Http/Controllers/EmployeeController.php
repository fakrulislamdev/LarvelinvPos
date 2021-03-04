<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employee;
class EmployeeController extends Controller
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
    	return view('add_employee');
    }
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'nid_no' => 'required|unique:employees|max:255',
        'address' => 'required',
        'phone' => 'required|max:13',
        'photo' => 'required',
        'salary' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image=$request->file('photo'); 


//image uplaod code
        if ($image) {
            $image_name=time().'_'.$request->email;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/admin/employees/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
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
    public function Allemployees()
    {
    	$employees=Employee::all();
    	return view ('all_employee',compact('employees'));
    }
    //view a single employee
    public function ViewEmployee($id)
    {
        $single = DB::table('employees')
                ->where('id',$id)
                ->first();
        return view('view_employee',compact('single'));
    }
    //Delete a single Employee
    public function DeleteEmployee($id)
    {
        $delete = DB::table('employees')
                ->where('id',$id)
                ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('employees')
                ->where('id',$id)
                ->delete();


                if ($dltuser) {
                    $notification=array(
                    'messege'=>'Successfully Employee Deleted ',
                    'alert-type'=>'success'
                     );
                   return Redirect()->route('all.employee')->with($notification);                      
                }else{
                 $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                     );
                    return Redirect()->back()->with($notification);
                }     
    }

    //edit single employee

    public function EditEmployee($id)
    {
        $edit = DB::table('employees')
        ->where('id',$id)
        ->first();
        return view ('edit_employee',compact('edit'));
    }
    //update a single employee
    public function UpdateEmployee(Request $request ,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'nid_no' => 'required|max:255',
            ]);
            $data=array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['phone']=$request->phone;
            $data['address']=$request->address;
            $data['experience']=$request->experience;
            $data['nid_no']=$request->nid_no;
            $data['salary']=$request->salary;
            $data['vacation']=$request->vacation;
            $data['city']=$request->city;
            $image=$request->photo; 
            if ($image) {
                $image_name=time().'_'.$request->email;
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/admin/employees/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if ($success) {
                   $data['photo']=$image_url;
                      $img=DB::table('employees')->where('id',$id)->first();
                      $image_path = $img->photo;
                      $done=unlink($image_path);
                   $user=DB::table('employees')->where('id',$id)->update($data); 
                  if ($user) {
                         $notification=array(
                         'messege'=>'Employee Update Successfully',
                         'alert-type'=>'success'
                          );
                        return Redirect()->route('all.employee')->with($notification);                      
                     }else{
                       return Redirect()->back();
                      } 
                   }
               }else{
                  $oldphoto=$request->old_photo;
                  if ($oldphoto) {
                   $data['photo']=$oldphoto;  
                   $user=DB::table('employees')->where('id',$id)->update($data); 
                  if ($user) {
                         $notification=array(
                         'messege'=>'Employee Update Successfully',
                         'alert-type'=>'success'
                          );
                        return Redirect()->route('all.employee')->with($notification);                      
                     }else{
                       return Redirect()->back();
                      } 
                   }
                }
    }
}
