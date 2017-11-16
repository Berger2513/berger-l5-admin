<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{

    use Notifiable, EntrustUserTrait;
    use TransformableTrait;

    protected $fillable = [
        'name', 'email', 'password',
    ];
    public $timestamps = false;
}
