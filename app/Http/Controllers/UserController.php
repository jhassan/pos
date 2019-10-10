<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\User;
use Validator;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new User;
        $users = $data->all_users();
        // Get the currently authenticated user's ID...
        $user_permission = Auth::id();
        return View('admin.users.index', compact('users', 'user_permission'));
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
      $validatedData = $request->validate([
        'first_name'   => 'required',
        'last_name'    => 'required',
        'email'  => 'required|email|unique:users',
  			'password'  => 'required|min:5',
  			'login_name'  => 'required',
  			'gender'  => 'required',
  			'user_type'  => 'required',
      ]);
      $data = new User();
  		$permission_checked = $request->permission;
  		if(!empty($permission_checked))
          	$arrayChickList = implode(',', $permission_checked);
  		else
  			$arrayChickList = "";
  		$data->first_name = $request->first_name;
  		$data->last_name = $request->last_name;
  		$data->password = bcrypt($request->password);
  		$data->login_name = $request->login_name;
  		$data->gender = $request->gender;
  		$data->email = $request->email;
  		$data->city = $request->city;
  		$data->address = $request->address;
  		$data->shop_id = (int)$request->shop_id;
  		$data->user_type = (int)$request->user_type;
  		$data->user_permission = $arrayChickList;

  		if($data->save()){
  			return redirect()->route("users")->with('message','User added successfully!');
  		}
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
