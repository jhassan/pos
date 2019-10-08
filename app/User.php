<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        // $arrayParentPermission = DB::table('permissions')->whereRaw('parent_id = 0')->get();
        // return $arrayParentPermission;

        // $user = App\User::find(1);
        return $this->hasOne('App\Permissions');
        // return $permissions->permissions()->where('parent_id', 0)->get();
    }
}
