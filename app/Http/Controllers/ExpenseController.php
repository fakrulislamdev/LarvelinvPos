<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('add_expense');
    }

    public function view_expense() {
        $data = Expense::all();
        return view('all_expense', compact('data'));
    }
    public function yearly_expense() {
        $data=date('Y');
        $year = DB::table('expenses')->where('year',$data)->get();
        return view('yearly_expense', compact('year'));
    }
    public function monthly_expense() {
        $data=date('F');
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function today_expense() {
        $data=date('d/m/y');
        $today = DB::table('expenses')->where('date',$data)->get();
        return view('today_expense', compact('today'));
    }

    public function store_expense(Request $r) {

        $r->validate([
            'details' => 'required',
            'amount' => 'required',
        ]);
        Expense::create($r->all());
        return redirect('/all_expense')->with('message', 'Expense info save successfully');
    }

    public function update_expense(Request $r) {
//        $r->validate([
//            'details' => 'required',
//            'amount' => 'required',
//            'month' => 'required',
//            'date' => 'required',
//       ]);
        Expense::where('id', $r->id)->update(array(
            'details' => $r->details,
            'amount' => $r->amount,
            'month' => $r->month,
            'date' => $r->date,
            'year' => $r->year,
        ));
        return redirect('/all_expense')->with('success', 'Expense updated successfully');
    }

    public function delete_expense($id) {
        Expense::where('id', $id)->delete();
        return redirect('/all_expense')->with('success', 'Expense deleted successfully');
    }

    public function edit_expense($id) {
        $data = Expense::find($id);
        return view('/edit_expense', compact('data'));
    }
    
    //Every month...........here
    public function january_expense() {
        $data='January';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function february_expense() {
        $data='February';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function march_expense() {
        $data='March';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function april_expense() {
        $data='April';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function may_expense() {
        $data='May';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function june_expense() {
        $data='June';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function july_expense() {
        $data='July';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function august_expense() {
        $data='August';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function september_expense() {
        $data='September';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function october_expense() {
        $data='October';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function november_expense() {
        $data='November';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
    public function december_expense() {
        $data='December';
        $month = DB::table('expenses')->where('month',$data)->get();
        return view('monthly_expense', compact('month'));
    }
}
