@extends('admin.layout.layout')

@section('title', '后台管理系统')
@section('link')
    <link href="{{  asset('admin_data/vendor/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{  asset('admin_data/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{  asset('admin_data/vendor/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <link href="{{  asset('admin_data/css/jquery.nestable.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="{{  asset('admin_data/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{  asset('admin_data/vendor/layer/layer.js') }}"></script>
@endsection

@section('content')




          <div class="">

            <div class="page-title">
              @include('flash::message')
              <div class="title_left">
                <h3>菜单管理</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- left panel -->
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pop Overs <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content bs-example-popovers">
                    <div class="dd" id="nestable_list_3">
                        <ol class="dd-list">
                          @inject('menu', 'App\Presenters\MenuPresenter')

                            {!! $menu->getMenuList($menus_list) !!}
                        </ol>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end left panel -->
              @permission('admin.menu.add')
              <!-- right panel -->
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Basic Elements </h2>
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
                  @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                  @endif
                      <form class="form-horizontal form-label-left" id="menuForm" action="{{route('admin.menu_store')}}" method="post">
                      {!!csrf_field()!!}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单名称</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="name" value="" placeholder="名称">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单图标</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="icon" value="" placeholder="菜单图标">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">父级菜单</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" name="parent_id">
                            @inject('menu', 'App\Presenters\MenuPresenter')

                            {!! $menu->getMenu($menus) !!}
                          </select>
                        </div>
                      </div>
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单权限</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="slug" value="" placeholder="菜单权限">
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单链接</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="url" value="" placeholder="菜单链接">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单高亮</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="heightlight_url" value="" placeholder="菜单高亮">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">菜单权限</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="power" value="" placeholder="权限">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">排序</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="sort" value="" placeholder="排序">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-default">取消</button>
                          <button type="submit" class="btn btn-success">提交</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              @endpermission
              <!-- end right panel -->
            </div>
          </div>

@endsection
@section('js')

    <!-- Select2 -->
    <script src="{{  asset('admin_data/vendor/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- nestable -->
    <script src="{{  asset('admin_data/js/jquery.nestable.js') }}"></script>
  <script>
      $(document).ready(function() {
        // Select2
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });

        // nestable
        $('#nestable_list_3').nestable();
      });
    </script>
<script type="text/javascript">

$('.createMenu').on('click',function () {
            var _item = $(this);
            var _select2 = $(".select2_single");
            $('#menuForm')[0].reset();
            _select2.val(_item.attr('data-pid')).trigger("change");
});
</script>
<script type="text/javascript">
$('.editMenu').on('click',function () {
    var _url = $(this).attr('data-path');
    var _id = $(this).attr('data-pid');
    $.ajax({
        url:_url,
        dataType:'json',
        data: {id: _id},
        beforeSend:function() {
            // loading
            layer.load(0);
        },
        success:function($data) {
            console.log($data);
            // 关闭loading
            layer.closeAll('loading');
            if($data) {
              $('input[name=name]').val($data.name);
              $(".select2_single").val($data.parent_id).trigger("change");
              $('input[name=icon]').val($data.icon);
              $('input[name=url]').val($data.url);
              $('input[name=heightlight_url] ').val($data.heightlight_url);
              $('input[name=sort]').val($data.sort);
              $('input[name=power]').val($data.power);
              $('#menuForm').attr('action',$data.update);
              $('#menuForm').append('<input type="hidden" name="id" value="'+$data.id+'">');
            }

            // layer.msg(menu.msg);
        }
  });
});
</script>
@endsection