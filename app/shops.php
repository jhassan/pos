<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shops extends Model
{
    public $table = 'shops';

    public function shop(){
	    return $this->hasMany('App\Account', 'shop_id', 'id');
	}
}
