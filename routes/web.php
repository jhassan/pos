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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/home', function () {
    return redirect(route('admin/home'));
});

// Route::get('/logout', function () {
//     return redirect(route('login'));
// });

Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('admin/home');

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second Middleware
//     });
//
//     Route::get('user/profile', function () {
//         // Uses first & second Middleware
//     });
// });

Route::group(
	array('prefix' => 'admin/users'), function () {
		Route::get('add', array('as' => 'add.user', 'uses' => 'UserController@create'));
    Route::get('/', array('as' => 'users', 'uses' => 'UserController@index'));
    Route::post('add', array('as' => 'add.user', 'uses' => 'UserController@store'));
    //Route::post('add', 'UserController@store');
    Route::get('{id}/edit', array('as' => 'edit.user', 'uses' => 'UserController@edit'));
    Route::post('{id}/edit', array('as' => 'edit.user', 'uses' => 'UserController@update'));
    Route::get('delete/{id}', 'UserController@destroy')->name('users.destroy');
		// Route::get('delete_user', array('as'=>'delete_user', 'uses' => 'UserController@delete_user'));
		// Route::get('{id}/delete', array('as' => 'delete/banner', 'uses' => 'UserController@getDelete'));
		Route::get('{id}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UserController@getModalDelete'));

		//Route::get('{id}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
	});

  // account routs
  Route::group(
  	array('prefix' => 'admin/accounts'), function () {
  		Route::get('frm_trial_balance', array('as' => 'frm_trial_balance', 'uses' => 'AccountController@frm_trial_balance'));
  		Route::post('trial_balance', array('as' => 'trial_balance', 'uses' => 'AccountController@trial_balance'));
  		// Load COA
  		Route::get('index_coa', array('as' => 'index_coa', 'uses' => 'AccountController@index'));
  		// Bank Pay Vouchers
  		Route::get('bank_pay', array('as' => 'bank_pay', 'uses' => 'AccountController@bank_pay'));
  		// Bank Receipt Vouchers
  		Route::get('bank_receipt', array('as' => 'bank_receipt', 'uses' => 'AccountController@bank_receipt'));
  		// Cash Pay Vouchers
  		Route::get('cash_pay', array('as' => 'cash_pay', 'uses' => 'AccountController@cash_pay'));
  		// Cash Receipt Vouchers
  		Route::get('cash_receipt', array('as' => 'cash_receipt', 'uses' => 'AccountController@cash_receipt'));
  		// All Vouchers
  		Route::get('all_vouchers', array('as' => 'all_vouchers', 'uses' => 'AccountController@all_vouchers'));
  		// View Sale Summery
  		Route::get('sale_summery', array('as' => 'sale_summery', 'uses' => 'AccountController@sale_summery'));
  		// View Sale Vouchers
  		Route::get('view_vouchers', array('as'=>'view_vouchers', 'uses' => 'AccountController@view_vouchers'));
  		// View General Vouchers
  		Route::get('general_voucher', array('as'=>'general_voucher', 'uses' => 'AccountController@general_voucher'));
  		// View General Ledger
  		Route::get('general_ledeger', array('as'=>'general_ledeger', 'uses' => 'AccountController@general_ledeger'));
  		// Search Ledger Vouchers
  		Route::post('view_ledger', array('as'=>'view_ledger', 'uses' => 'AccountController@view_ledger'));
  		// Search Cash Book
  		Route::get('frm_cash_book', array('as'=>'frm_cash_book', 'uses' => 'AccountController@frm_cash_book'));
  		// View Cash Book
  		Route::post('view_cash_book', array('as'=>'view_cash_book', 'uses' => 'AccountController@view_cash_book'));
  		// Delete Vouchers
  		Route::get('delete_vouchers', array('as'=>'delete_vouchers', 'uses' => 'AccountController@delete_vouchers'));
  		// Search Sale Summery
  		Route::post('search_view_ledger', array('as'=>'search_view_ledger', 'uses' => 'AccountController@all_search_view_ledger'));
  		// Payment Vouchers
  		Route::get('payment_voucher', array('as' => 'payment_voucher', 'uses' => 'AccountController@payment_voucher'));
  		// Purchase Vouchers
  		Route::get('purchase_voucher', array('as' => 'purchase_voucher', 'uses' => 'AccountController@purchase_voucher'));
  		// General Vouchers
  		Route::post('save_general_voucher', array('as' => 'save_general_voucher', 'uses' => 'AccountController@save_general_voucher'));
  		// Add Purchase Voucher
  		Route::post('add_purchase_voucher', array('as' => 'add_purchase_voucher', 'uses' => 'AccountController@add_purchase_voucher'));
  		// View Purchase Items
  		Route::get('purchased_items_details', array('as' => 'purchased_items_details', 'uses' => 'AccountController@purchased_items_details'));
  		// Search Purchase Items
  		Route::post('frm_purchased_items_details', array('as' => 'frm_purchased_items_details', 'uses' => 'AccountController@purchased_items_details'));
  	});
