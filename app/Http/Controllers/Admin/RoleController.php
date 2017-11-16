<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Models\Role;

class RoleController extends Controller
{
    public $role;
    public $permission;

    public function __construct(RoleRepository $role,PermissionRepository $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index()
    {
        $roles = $this->role->all();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        return view('admin.permission.create',compact('role'));
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
            'name.required' => '角色名称不能为空',
            'name.unique' => '角色名称不能重复',
            'display_name.required' => '父级不能为空',
            'description.required' => '角色链接不能为空',
        ];
        request()->validate([
            'name' => 'required|unique:permissions',
            'display_name' => 'required',
            'description' =>'required'
        ],$message);
        $input = $request->except('_token');

        $result = $this->role->create( $input);
        if($result){
            flash('权限添成功')->success();
            return redirect()->route('admin.role.index');
        }else {
            flash('权限添加失败')->error();
            return redirect()->back();
        }
    }

    public function role_permission(Request $request)
    {
        $permission_list = $this->role->getAllPermissions($request->id);
        dump($permission_list);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->role->find($id);

        return view('admin.role.create', compact('role'));
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
        $result= $this->role->update($request->all(),$id);
        if($result){
            flash('权限修改成功')->success();
            return redirect()->route('admin.role.index');
        }else {
            flash('权限修改失败')->error();
            return redirect()->back();
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
        //
    }
}
