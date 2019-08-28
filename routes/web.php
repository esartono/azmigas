<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */
Auth::routes();

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('employees', 'EmployeeController');
    Route::resource('products', 'ProductController');
    Route::resource('vehicles', 'VehicleController');
    Route::resource('warehouses', 'WarehouseController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('customers', 'CustomerController');
    Route::resource('drivers', 'DriverController');
    Route::get('/jualbeli', 'ProductTransactionController@choose')->name('jualbeli');
    Route::resource('product_transactions', 'ProductTransactionController');
    Route::get('product_transactions/filter', 'ProductTransactionController@filter')->name('product_transactions.filter');
    Route::resource('type_product_transactions', 'TypeProductTransactionController');
    Route::resource('routes', 'RouteController');
});