<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Role_user extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'role_user';
    protected $fillable = ['user_id', 'role_id'];
     public $timestamps = false;

}
