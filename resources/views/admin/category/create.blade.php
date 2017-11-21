@extends('admin.layout.layout')

@section('title', 'Page Title')
@section('link')
@endsection
@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>分类 <small>Category 用于文章管理</small></h3>
  </div>
</div>
<div class="clearfix"></div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>添加分类<small>create category</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <br />
        @if( !empty($category->id))
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('admin.category.update',array('id'=>$category->id))}}">
        <input type="hidden" name="_method" value="put"/>
        @else
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/category ')}}">
        @endif
           {{ csrf_field() }}
          <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">分类名称 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name='name' class="form-control col-md-7 col-xs-12" value="{{$category->name or ''}}">
                </div>
          </div>
          <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">父级名称 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select class="form-control" name="parent_id">
                    <option value="0">最高级别</option>
                    @foreach($options as $value)
                    <option value="{{$value->id}}"
                    @if($category->parent_id == $value->id && isset($category->parent_id))
                    selected
                    @endif
                        >
                        {{$value->name}}
                    </option>
                    @endforeach
                  </select>
                </div>
          </div>
          <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">排序
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <input type="text"  name="sort"  class="form-control col-md-7 col-xs-12" value="{{$category->sort or 255}}">
                </div>
          </div>
          <div class="ln_solid"></div>

          <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">提交</button>
                </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')

<script type="text/javascript">
$(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
          $('#demo-form2').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
</script>

@endsection