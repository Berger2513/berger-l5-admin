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
        <h2>用户管理 <small>Users</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <!-- @permission('admin.role.add')
            <li><a class="btn btn-default" href="{{ route('admin.user.create')}}"><i class="fa fa-plus"></i>添加</a>
            </li>
            @endpermission -->
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
                      <th>用户名称</th>
                      <th>昵称</th>
                      <th>email</th>
                      <th>角色</th>
                      <th>操作</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->nickname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->display_name}}</td>
                        <td>


                          @if(Auth()->user()->can('admin.user.edit'))
                          <a href="{{route('admin.user.edit',array('id'=>$user->id,'action'=>'edit' ))}}" class="btn btn-default">修改</a>
                          <a href="{{route('admin.user.edit',array('id'=>$user->id,'action'=>'edit_role' ))}}" class="btn btn-default">分配角色</a>
                          @endif

                          @if(Auth()->user()->can('admin.user.delete'))
                          <form action="{{route('admin.user.delete',array('id'=>$user->id))}}" method="post">
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