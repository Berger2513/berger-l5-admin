<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Repositories\PermissionRepository;
use App\Models\Permission;
use App\Models\Role;

class PermissionController extends Controller
{
    public $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->middleware('check.permission:permission');
        $this->permission = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permission->all();
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = new Permission();
        return view('admin.permission.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,MenuRepository $menus)
    {
       $message = [
            'name.required' => '菜单名称不能为空',
            'name.unique' => '菜单名称不能重复',
            'display_name.required' => '父级不能为空',
            'description.required' => '菜单链接不能为空',
        ];
        request()->validate([
            'name' => 'required|unique:permissions',
            'display_name' => 'required',
            'description' =>'required'
        ],$message);
        $input = $request->except('_token');

        $result = $this->permission->create( $input);
        if($result){
            flash('权限添成功')->success();
            return redirect()->route('admin.permission.index');
        }else {
            flash('权限添加失败')->error();
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
        $permission = $this->permission->find($id);

        return view('admin.permission.create', compact('permission'));
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

        $result= $this->permission->update($request->all(),$id);
        if($result){
            flash('权限修改成功')->success();
            return redirect()->route('admin.permission.index');
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
