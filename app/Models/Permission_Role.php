<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Permission_Role extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'permission_role';
    protected $fillable = ['permission_id', 'role_id'];

    public $timestamps = false;
}
