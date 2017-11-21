<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Models\Category;
class CategoryController extends Controller
{
    public $category;

    public function __construct(CategoryRepository $category)
    {
        $this->middleware('check.permission:category');
        $this->category = $category;
    }

    public function index(Request $Request)
    {
        if(empty($Request->id)){
            $categorys = $this->category->findWhere(['parent_id'=>0]);
            $flag = true;
        } else {
            $categorys = $this->category->findWhere(['parent_id'=>$Request->id]);
            $flag = false;
        }
        return view('admin.category.index',compact('categorys','flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $options = $this->category->findWhere(['parent_id'=> 0]);
        return view('admin.category.create',compact('options', 'category'));
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
            'name.required' => '分类名称不能为空',
            'name.unique' => '分类名称不能重复',
            'display_name.required' => '父级不能为空',
            'sort.required' => '排序不能为空',
        ];
        request()->validate([
            'name' => 'required|unique:category',
            'parent_id' => 'required',
            'sort' =>'required'
        ],$message);

        $input = $request->except('_token');

        $result = $this->category->create( $input);
        if($result){
            flash('分类添成功')->success();
            return redirect()->route('admin.category.index');
        }else {
            flash('分类添加失败')->error();
            return redirect()->back();
        }
        $input = $request->except('_token');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $result= $this->category->update($request->all(),$id);
        if($result){
            flash('分类修改成功')->success();
            return redirect()->route('admin.permission.index');
        }else {
            flash('分类修改失败')->error();
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        $options = $this->category->findWhere(['parent_id'=>0]);
        return view('admin.category.create', compact('category','options'));
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
        $result= $this->category->update($request->all(),$id);
        if($result){
            flash('分类修改成功')->success();
            return redirect()->route('admin.category.index');
        }else {
            flash('分类修改失败')->error();
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
      $result = $this->category->del($id);
      if($result){
            flash('分类删除成功')->success();
            return redirect()->route('admin.category.index');
        }else {
            flash('分类删除失败')->error();
            return redirect()->back();
        }
    }
}
