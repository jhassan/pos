<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function all_parent_permission()
    {
        $arrayParentPermission = DB::table('permissions')->whereRaw('parent_id = 0')->get();
        return $arrayParentPermission;

        // $user = App\User::find(1);
        // return $this->hasOne('App\Permissions');
        // return $permissions->permissions()->where('parent_id', 0)->get();
    }

    public function all_child_permission()
    {
        $arrayChieldPerission = DB::table('permissions')->get();
        return $arrayChieldPerission;
    }

    // Get user permissions
    public function user_permissions($id)
    {
        $arrayPermission = DB::table('users')
                    ->select('user_permission')
                    ->where('id', '=', $id)
                    ->get();
        return $arrayPermission[0]->user_permission;
    }

    // get all Shops
    public function all_shops(){
      return DB::table('shops')->orderBy('id', 'desc')->get();
    }
}
