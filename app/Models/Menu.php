<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Menu extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name', 'parent_id', 'url','icon', 'heightlight_url', 'sort', 'power'
    ];
    public $timestamps = false;
}
