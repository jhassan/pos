<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\User;
use Validator;
use Input;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = new User;
      $parentPermission = $data->all_parent_permission();
      $childPermission = $data->all_child_permission();
      $shops = $data->all_shops();
      return View('admin.users.create', compact('parentPermission', 'childPermission', 'shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = array(
              'first_name'   => 'required',
              'last_name'    => 'required',
  			      'email'        => 'required|email|unique:users',
  			      'password'     => 'required|min:5',
  			      'login_name'   => 'required',
  			      'gender'       => 'required',
  			      'user_type'    => 'required',
      );

      // Create a new validator instance from our validation rules
      $validator = Validator::make(Input::all(), $rules);

      // If validation fails, we'll exit the operation now.
      if ($validator->fails()) {
		       return Redirect::back()->withInput()->withErrors($validator);
      }

      User::create($request->all());

      return redirect()->route('users.add')
                      ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
