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
    @yield('link')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          @include('admin.layout.left')
           <div class="right_col" role="main">
            @yield('content')
           </div>

          @include('admin.layout.footer')
      </div>
    </div>

    <script src="{{  asset('admin_data/vendor/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{  asset('admin_data/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{  asset('admin_data/vendor/fastclick/lib/fastclick.js') }}."></script>
    <!-- NProgress -->
    <script src="{{  asset('admin_data/vendor/nprogress/nprogress.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{  asset('admin_data/js/custom.min.js') }}"></script>
  @yield('js')
  <script type="text/javascript">
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
  </script>
  </body>
</html>