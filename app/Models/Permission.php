<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Permission extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'display_name', 'description', 'parent_id'];

}
