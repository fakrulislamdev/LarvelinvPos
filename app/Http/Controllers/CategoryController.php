<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('add_category');
    }
    
    public function view_category() {
        $data = Category::all();
        return view('all_category', compact('data'));
    }

    public function store_category(Request $r) {

        $r->validate([
            'cat_name' => 'required|max:255',
        ]);
        Category::create($r->all());
        return redirect('/all_category')->with('success', 'Category info save successfully');
    }

    public function update_category(Request $r) {

        Category::where('id', $r->id)->update(array(
            'cat_name' => $r->cat_name,
        ));
        return redirect('/all_category')->with('success', 'Category updated successfully');
    }

    public function delete_category($id) {
        Category::where('id', $id)->delete();
        return redirect('/all_category')->with('success', 'Category deleted successfully');
    }

    public function edit_category($id) {
        $data = Category::find($id);
        return view('/edit_category', compact('data'));
    }
}
