@extends('admin.layout.layout')

@section('title', 'Page Title')
@section('link')
<link href="{{asset('admin_data/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">


@endsection
@section('content')
@include('flash::message')
<div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>权限管理 <small>Users</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="btn btn-default" href="{{ route('admin.permission.index')}}"><i class="fa  fa-mail-forward "></i>返回上级</a>
            </li>
            @permission('admin.permission.add')
            <li><a class="btn btn-success" href="{{ route('admin.permission.create')}}"><i class="fa fa-plus"></i>添加</a>
            </li>
            @endpermission

          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
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
                      <th>权限规则</th>
                      <th>权限名称</th>
                      <th>权限说明</th>
                      <th>操作</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->display_name}}</td>
                        <td>{{$permission->description}}</td>
                        <td>
                          <a href="{{route('admin.permission.edit',array('id'=>$permission->id))}}" class="btn btn-default">修改</a>
                          @if(isset($flag) && $flag== true)
                            <a href="{{route('admin.permission.index',array('id'=>$permission->id))}}" class="btn btn-default">查看下级</a>
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