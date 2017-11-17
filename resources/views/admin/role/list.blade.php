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
</div>
<div class="clearfix"></div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('admin.role.update',array('id'=>$id))}}">
                      <input type="hidden" name="_method" value="put"/>
                      <input type="hidden" name="action" value="role_update"/>
    {{ csrf_field() }}
<ul class="messages">
    @foreach($permission_list as $list)
  <li>
    <div class="message_wrapper">
      <h4 class="heading">
        <input type="checkbox" name='permission[]' value="{{$list['id']}}" class="checkbox_title_{{$list['id']}}" @if(in_array($list['id'],$user_permission_list)) checked @endif>{{$list['display_name']}}</h4>
      <br>
      @foreach($list['chlid'] as $data)

        <label>
          <input type="checkbox" onchange="changStatus({{$list['id']}})" class="checkbox_son_{{$list['id']}}" name='permission[]' value="{{$data['id']}}" @if(in_array($data['id'],$user_permission_list)) checked @endif>
          {{$data['display_name']}}
        </label>
       @endforeach
    </div>
  </li>
    @endforeach
</ul>
 <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="submit" class="btn btn-success">提交</button>
    </div>
  </div>
</form>
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

function changStatus(id)
{
    $('.checkbox_son_'+id).each(function(){
        if($(this).attr('checked')){
            $('.checkbox_title_'+id).attr('checked',true);
            return;
        }
    })
}
</script>

@endsection