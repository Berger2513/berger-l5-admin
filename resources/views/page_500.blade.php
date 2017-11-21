<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>牧羊人 Berger |  @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{  asset('admin_data/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{  asset('admin_data/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{  asset('admin_data/vendor/nprogress/nprogress.css') }}../" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{  asset('admin_data/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{  asset('admin_data/css/base.css') }}" rel="stylesheet">
    <script src="{{  asset('admin_data/vendor/jquery/dist/jquery.min.js') }}"></script>
  </head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center">
              <h1 class="error-number">500</h1>
              <h2>{{$message}}</h2>
              <p>Sorry, you don't have permission.
              </p>
              <div class="mid_center">
                <h2>返回上一页<small> Return Please Click This?</small></h2>
                <a href="{{url()->previous()}}" class="btn btn-success">Click</a>

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
  </div>
</body>

    <script src="{{  asset('admin_data/vendor/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{  asset('admin_data/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{  asset('admin_data/vendor/fastclick/lib/fastclick.js') }}."></script>
    <!-- NProgress -->
    <script src="{{  asset('admin_data/vendor/nprogress/nprogress.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{  asset('admin_data/js/custom.min.js') }}"></script>

  </body>
</html>

