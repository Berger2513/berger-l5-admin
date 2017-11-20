<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Presenters\MenuPresenter;
use Cache;
use Auth;

class HomeController extends Controller
{
    public $menu;
    public $MenuPresenter;

    public function __construct(MenuRepository $menu,MenuPresenter $MenuPresenter)
    {
        $this->menu = $menu;
        $this->MenuPresenter = $MenuPresenter;
    }
    public function index()
    {
        return view('admin.home.index');
    }
    public function menu_show()
    {
        $menus = $this->menu->findByField('parent_id', 0);

        $menus_list = $this->menu->GetMenuList();

        return view('admin.home.menu', compact('menus','menus_list'));
    }
    public function menu_store(Request $request)
    {


        if(isset($request->id)) {
             $message = [
                'name.required' => '菜单名称不能为空',
                'parent_id.required' => '父级不能为空',
                'url.required' => '菜单链接不能为空',
            ];
            request()->validate([
                'name' => 'required',
                'parent_id' => 'required',
                'url' =>'required'
            ],$message);
            $input = $request->except('_token');

            $resoult = $this->menu->update($input,$request->id);

            $this->menu->sortMenu();

            if ($resoult) {
                flash('菜单修改成功')->success();
            } else {
                flash('菜单修改失败')->error();
            }
            return redirect()->route('admin.menu_show');
        } else {
            $message = [
                'name.required' => '菜单名称不能为空',
                'name.unique' => '菜单名称唯一',
                'parent_id.required' => '父级不能为空',
                'url.required' => '菜单链接不能为空',
            ];
            request()->validate([
                'name' => 'required|unique:menus',
                'parent_id' => 'required',
                'url' =>'required'
            ],$message);
             $input = $request->except('_token');
            $resoult = $this->menu->create($input);

            $this->menu->sortMenu();
            if ($resoult) {
                flash('菜单添成功')->success();
            } else {
                flash('菜单添失败')->error();
            }
            return redirect()->route('admin.menu_show');
        }
    }
    public function menu_update(Request $request)
    {
        $menu = $this->menu->find($request->id);
        return response()->json($menu);
    }


    public function logout(Request $request)
    {
        Auth()->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
