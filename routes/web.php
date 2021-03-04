<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('verified')->group(function () {

//this place for email verified routes

});

//Employee Routes Are Here
Route::get('/add-employee', [EmployeeController::class, 'index'])->name('add.employee');
Route::post('/insert-employee', [EmployeeController::class, 'store']);
Route::get('/all-employee', [EmployeeController::class, 'Allemployees'])->name('all.employee');
Route::get('/view-employee/{id}', [EmployeeController::class, 'ViewEmployee'])->name('view.employee');
Route::get('/delete-employee/{id}', [EmployeeController::class, 'DeleteEmployee'])->name('delete.employee');
Route::get('/edit-employee/{id}', [EmployeeController::class, 'EditEmployee'])->name('edit.employee');
Route::post('/update-employee/{id}', [EmployeeController::class, 'UpdateEmployee'])->name('update.employee');

//Customer Routes Are Here
Route::get('/add-customers', [CustomerController::class,'index'])->name('add.customer');
Route::post('/insert_customer', [CustomerController::class, 'store']);
Route::get('/all-customer', [CustomerController::class,'AllCustomer'])->name('all.customer');
Route::get('/delete-customer/{id}', [CustomerController::class, 'DeleteCustomer'])->name('delete.customer');
Route::get('/edit-customer/{id}', [CustomerController::class, 'EditCustomer'])->name('edit.customer');
Route::post('/update-customer/{id}', [CustomerController::class, 'UpdateCustomer'])->name('update.customer');
Route::get('/view-customer/{id}', [CustomerController::class, 'ViewCustomer'])->name('view.customer');

//Suppliers Routes.............

Route::get('/add_supplier', [SupplierController::class, 'index'])->name('add_supplier');
Route::get('/all_supplier', [SupplierController::class, 'view_supplier'])->name('all_supplier');
Route::post('/store_supplier', [SupplierController::class, 'store_supplier']);
Route::get('/delete_supplier/{id}', [SupplierController::class, 'delete_supplier']);
Route::post('/update_supplier/{id}', [SupplierController::class, 'update_supplier']);
Route::get('/edit_supplier/{id}', [SupplierController::class, 'edit_supplier']);

//Advanced Salary Routes.............

Route::get('/add_advanced_salary', [SalaryController::class, 'index'])->name('add_advanced_salary');
Route::get('/all_advanced_salary', [SalaryController::class, 'view_advanced_salary'])->name('all_advanced_salary');
Route::post('/store_advanced_salary', [SalaryController::class, 'store_advanced_salary']);

//Salary Routes.............................

Route::get('/pay_salary', [SalaryController::class, 'pay_salary'])->name('pay_salary');



//Category Routes.............................

Route::get('/add_category', [CategoryController::class, 'index'])->name('add_category');
Route::get('/all_category', [CategoryController::class, 'view_category'])->name('all_category');
Route::post('/store_category', [CategoryController::class, 'store_category']);
Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category']);
Route::post('/update_category/{id}', [CategoryController::class, 'update_category']);
Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category']);


//Product Routes.............................

Route::get('/add_product', [ProductController::class, 'index'])->name('add_product');
Route::get('/all_product', [ProductController::class, 'view_product'])->name('all_product');
Route::post('/store_product', [ProductController::class, 'store_product']);
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);
Route::post('/update_product/{id}', [ProductController::class, 'update_product']);
Route::get('/edit_product/{id}', [ProductController::class, 'edit_product']);
Route::get('/single_product/{id}', [ProductController::class, 'single_product']);

//Product Import and Export Route.............
Route::get('/import_product', [ProductController::class, 'import_product'])->name('import_product');
Route::get('/export', [ProductController::class, 'export'])->name('export');
Route::post('/import', [ProductController::class, 'import'])->name('import');

//Sales Report...................
Route::get('/total_sales', [ProductController::class, 'TotalSales'])->name('total_sales');

//Expense Routes.............................

Route::get('/add_expense', [ExpenseController::class, 'index'])->name('add_expense');
Route::get('/all_expense', [ExpenseController::class, 'view_expense'])->name('all_expense');
Route::get('/today_expense', [ExpenseController::class, 'today_expense'])->name('today_expense');
Route::get('/monthly_expense', [ExpenseController::class, 'monthly_expense'])->name('monthly_expense');
Route::get('/yearly_expense', [ExpenseController::class, 'yearly_expense'])->name('yearly_expense');
Route::post('/store_expense', [ExpenseController::class, 'store_expense']);
Route::get('/delete_expense/{id}', [ExpenseController::class, 'delete_expense']);
Route::post('/update_expense/{id}', [ExpenseController::class, 'update_expense']);
Route::get('/edit_expense/{id}', [ExpenseController::class, 'edit_expense']);
//More Monthly Expense.............
Route::get('/january_expense', [ExpenseController::class, 'january_expense'])->name('january_expense');
Route::get('/february_expense', [ExpenseController::class, 'february_expense'])->name('february_expense');
Route::get('/march_expense', [ExpenseController::class, 'march_expense'])->name('march_expense');
Route::get('/april_expense', [ExpenseController::class, 'april_expense'])->name('april_expense');
Route::get('/may_expense', [ExpenseController::class, 'may_expense'])->name('may_expense');
Route::get('/june_expense', [ExpenseController::class, 'june_expense'])->name('june_expense');
Route::get('/july_expense', [ExpenseController::class, 'july_expense'])->name('july_expense');
Route::get('/august_expense', [ExpenseController::class, 'august_expense'])->name('august_expense');
Route::get('/september_expense', [ExpenseController::class, 'september_expense'])->name('september_expense');
Route::get('/october_expense', [ExpenseController::class, 'october_expense'])->name('october_expense');
Route::get('/november_expense', [ExpenseController::class, 'november_expense'])->name('november_expense');
Route::get('/december_expense', [ExpenseController::class, 'december_expense'])->name('december_expense');

//Attendance Routes.............................

Route::get('/take_attendance', [AttendanceController::class, 'take_attendance'])->name('take_attendance');
Route::post('/insert_attendance', [AttendanceController::class, 'insert_attendance'])->name('insert_attendance');
Route::get('/all_attendance', [AttendanceController::class, 'all_attendance'])->name('all_attendance');
Route::get('/edit_attendance/{edit_date}', [AttendanceController::class, 'edit_attendance']);
Route::post('/update_attendance', [AttendanceController::class, 'update_attendance']);
Route::get('/view_attendance/{edit_date}', [AttendanceController::class, 'view_attendance']);

//Setting Route.................................

Route::get('/setting', [SettingController::class, 'index'])->name('setting');
Route::post('/update_website/{id}', [SettingController::class, 'update_setting']);

//Pos Routes.............

Route::get('/pos', [PosController::class, 'index'])->name('pos');
Route::get('/pending_order', [PosController::class, 'PendingOrder'])->name('pending_order');
Route::get('/view_order_status/{id}', [PosController::class, 'ViewOrder']);
Route::get('/pos_done/{id}', [PosController::class, 'PosDone']);
Route::get('/success_order', [PosController::class, 'SuccessOrder'])->name('success_order');


//Cart Controller...................

Route::post('/add_cart', [CartController::class, 'index'])->name('add_cart');
Route::post('/cart_update/{rowId}', [CartController::class, 'cart_update']);
Route::get('/cart_remove/{rowId}', [CartController::class, 'cart_remove']);

Route::post('/create_invoice', [CartController::class, 'create_invoice']);
Route::post('/final_invoice', [CartController::class, 'FinalInvoice']);