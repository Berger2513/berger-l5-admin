<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Models\Role_user;

class UserController extends Controller
{
    public $role;
    public $user;

    public function __construct(RoleRepository $role,UserRepository $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

     public function index()
    {
        $users = $this->user->all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'name.required' => '用户登录名名称不能为空',
            'name.unique' => '用户登录名名称不能重复',
            'nickname.required' => '昵称不能为空',
            'nickname.unique' => '昵称不能重复',
            'email.required' => '邮箱不能为空',
        ];
        request()->validate([
            'name' => 'required|unique:users',
            'nickname' => 'required|unique:users',
            'email' =>'required'
        ],$message);
        $input = $request->except('_token');

        $result = $this->role->create( $input);
        if($result){
            flash('用户添成功')->success();
            return redirect()->route('admin.role.index');
        }else {
            flash('用户添加失败')->error();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if ($request->action == 'edit_role') {
            //分配用户角色
            $user  = $this->user->find($id);
            $roles = $this->role->all();
            return view('admin.user.user_role', compact('user','roles'));
        } else {
            //修改用户资料
            $user = $this->user->find($id);
            return view('admin.user.create', compact('user'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->action == 'edit_role') {
            $input = $request->only('user_id','role_id');
            $result = Role_user::where('user_id',$request->user_id)->update($input);
            if($result){
                flash('用户修改成功')->success();
                return redirect()->route('admin.user.index');
            }else {
                flash('用户修改失败')->error();
                return redirect()->back();
            }
        } else {
            $result= $this->user->update($request->all(),$id);
            if($result){
                flash('用户修改成功')->success();
                return redirect()->route('admin.user.index');
            }else {
                flash('用户修改失败')->error();
                return redirect()->back();
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result= $this->user->delete($id);
      if($result){
            flash('用户删除成功')->success();
            return redirect()->route('admin.user.index');
        }else {
            flash('用户删除失败')->error();
            return redirect()->back();
        }
    }
}
