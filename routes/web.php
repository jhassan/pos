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
		Route::get('add', array('as' => 'add/user', 'uses' => 'UserController@create'));
    Route::get('/', array('as' => 'users', 'uses' => 'UserController@index'));
		Route::post('add', 'UsersController@createUser');
    Route::get('{id}/edit', array('as' => 'users.update', 'uses' => 'UsersController@getEdit'));
		Route::post('{id}/edit', 'UsersController@postEdit');
		Route::get('delete_user', array('as'=>'delete_user', 'uses' => 'UsersController@delete_user'));
		Route::get('{id}/delete', array('as' => 'delete/banner', 'uses' => 'UsersController@getDelete'));
		Route::get('{id}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));

		//Route::get('{id}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
	});
