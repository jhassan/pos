<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VoucherMaster;
use Auth;
use Response;
use View;
use App\Account;
use DB;
// use Input;

class AccountController extends Controller
{

  // all_vouchers
	public function all_vouchers(Request $request)
	{
		$data = new account;
	 	$start_date = stripcslashes($request->start_date);
	 	$end_date   = stripcslashes($request->end_date);
	 	$shop_id = $request->shop_id;
	 	$start_date = date("Y-m-d", strtotime($start_date));
	 	$end_date = date("Y-m-d", strtotime($end_date));
		$shops = DB::table('shops')->orderBy('id', 'desc')->get();
		if($request->ajax()){
            if(!empty($shop_id)){
                $arrayVouchers = $data->all_vouchers($shop_id, $start_date, $end_date);
            }
            return Response::json(view('admin.tables.all_vouchers_table', compact('arrayVouchers','shops', 'start_date', 'end_date', 'shop_id'))->render());
        } else {
            // $data = new account;
	 		$arrayVouchers = $data->all_vouchers($shop_id, $start_date, $end_date);
            return View::make('admin/accounts/all_vouchers', compact('arrayVouchers','shops', 'start_date', 'end_date'));
        }
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
