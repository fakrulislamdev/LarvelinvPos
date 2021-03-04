<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('add_supplier');
    }
    
    public function view_supplier() {
        $data = Supplier::all();
        return view('all_supplier', compact('data'));
    }

    public function store_supplier(Request $r) {

        $r->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'type' => 'required'
        ]);
        Supplier::create($r->all());
        return redirect('/all_supplier')->with('successsuccess', 'Supplier info save successfully');
    }

    public function update_supplier(Request $r) {
//        $r->validate([
//            'name' => 'required|max:255',
//            'email' => 'required',
//            'phone' => 'required',
//            'address' => 'required',
//            'experiance' => 'required',
//            'salary' => 'required',
//            'vacation' => 'required',
//            'city' => 'required'
//        ]);
        Supplier::where('id', $r->id)->update(array(
            'name' => $r->name,
            'email' => $r->email,
            'phone' => $r->phone,
            'address' => $r->address,
            'type' => $r->type,
            'shoap' => $r->shoap,
            'account_holder' => $r->account_holder,
            'account_number' => $r->account_number,
            'bank_name' => $r->bank_name,
            'branch_name' => $r->branch_name,
            'city' => $r->city,
        ));
        return redirect('/all_supplier')->with('success', 'Supplier updated successfully');
    }

    public function delete_supplier($id) {
        Supplier::where('id', $id)->delete();
        return redirect('/all_supplier')->with('success', 'Supplier deleted successfully');
    }

    public function edit_supplier($id) {
        $data = Supplier::find($id);
        return view('/edit_supplier', compact('data'));
    }
}
