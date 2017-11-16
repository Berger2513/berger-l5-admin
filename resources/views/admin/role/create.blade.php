@extends('admin.layout.layout')

@section('title', 'Page Title')
@section('link')
@endsection
@section('content')
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
                    <h2>Form Design <small>different form elements</small></h2>
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
                    @if( !empty($role->id))
                     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('admin.role.update',array('id'=>$role->id))}}">
                      <input type="hidden" name="_method" value="put"/>
                    @else
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/role ')}}">
                    @endif

                       {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">权限规则 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name='name' required="required" class="form-control col-md-7 col-xs-12" value="{{$role->name or '' }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">权限名称<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="display_name" required="required" class="form-control col-md-7 col-xs-12" value="{{$role->display_name or '' }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">描述<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <input type="text"  name="description" required="required" class="form-control col-md-7 col-xs-12" value="{{$role->description or '' }}">
                          </textarea>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    @if( !empty($role->id))
                    <input type="hidden" name="id" value="{{$role->id}}">
                    @endif
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