@extends('admin.layout.layout')

@section('title', 'Page Title')
@section('link')
<link href="{{asset('admin_data/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">


@endsection
@section('content')
@include('flash::message')

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>分类管理 <small>category</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="btn btn-default" href="{{ route('admin.category.index')}}"><i class="fa  fa-mail-forward "></i>返回上级</a>
            </li>
            @permission('admin.permission.add')
            <li><a class="btn btn-success" href="{{ route('admin.category.create')}}"><i class="fa fa-plus"></i>添加</a>
            </li>
            @endpermission
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">

        </p>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                     <tr>
                      <th>编号</th>
                      <th>分类名称</th>
                      <th>操作</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach($categorys as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                          <a href="{{route('admin.category.edit',array('id'=>$category->id))}}" class="btn btn-default">修改</a>
                            @if(isset($flag) && $flag== true)
                                <a href="{{route('admin.category.index',array('id'=>$category->id))}}" class="btn btn-default">查看下级</a>
                            @endif

                            @if(Auth()->user()->can('admin.category.delete'))
                          <form action="{{route('admin.category.delete',array('id'=>$category->id))}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-default">删除</button>
                          </form>
                          @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('admin_data/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin_data/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
$('#datatable-responsive').DataTable({
        scrollY: 400,
        paging: true,
});

</script>

@endsection