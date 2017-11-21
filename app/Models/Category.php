<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'category';
    protected $fillable = ['name', 'parent_id', 'sort'];
    public $timestamps = false;
}
