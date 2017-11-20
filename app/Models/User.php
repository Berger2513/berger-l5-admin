<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use DB;

class User extends Authenticatable
{

    use Notifiable, EntrustUserTrait;
    use TransformableTrait;

    protected $append = ['role'];
    protected $fillable = [
        'name', 'email', 'password','nickname'
    ];
    public $timestamps = false;

    public function getRoleAttribute()
    {
        return  DB::table('role_user')
            ->Join('users', 'role_user.user_id', '=', 'users.id')
            ->Join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('users.id',$this->id)
            ->first();
    }
}
