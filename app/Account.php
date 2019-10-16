<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Account extends Model
{
  // View All Vouchers
  public function all_vouchers($shop_id, $start_date, $end_date)
  {
    if(empty($shop_id)){
      $arrayVouchers = DB::table('vouchermaster')
        ->join('shops', 'shops.id', '=', 'vouchermaster.shop_id')
        ->orderBy('vm_date', 'desc')
        ->paginate(20);
    }
    else
    {
      $arrayVouchers = DB::table('vouchermaster')
        ->join('shops', 'shops.id', '=', 'vouchermaster.shop_id')
        ->whereRaw('vouchermaster.shop_id =  "'.$shop_id.'" AND vm_date >= "'.$start_date.'" AND vm_date <= "'.$end_date.'"')
        ->orderBy('vm_date', 'desc')
        ->paginate(20);
    }
    return $arrayVouchers;
  }
}
