<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Repositories\Contracts\UserContracts;

class IndexController extends Controller
{
    public function index(UserContracts $user)
    {
       // $createPost = new Permission();
       dd($user->findby(1));
    }
}