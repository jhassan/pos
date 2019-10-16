<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Account extends Model
{
  // View All Vouchers

  public $table = 'vouchermaster';


  public function shop(){
    return $this->belongsTo('App\Shops', 'shop_id', 'id');
  }


  public function all_vouchers($shop_id, $start_date, $end_date)
  {
    if(empty($shop_id)):
      $abc = Account::with('shop')->orderBy('vm_date', 'desc')->get();
    else:
      $abc = Account::with('shop')->orderBy('vm_date', 'desc')
        ->where(['shop_id' => $shop_id, 'vm_date >=' => $start_date, 'vm_date <=', $end_date])->get();
    endif;  
    

// array(
//   '' => '',
//   '' => '',
//   '' => '',
//   'shops' => array(
//       [0] => array(
//           '' => ''
//       )
//     )
// )

echo '<pre>';
print_r($abc->toArray());
die;
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
