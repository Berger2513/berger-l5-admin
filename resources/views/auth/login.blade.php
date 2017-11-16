<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>牧羊人</title>
    <!-- Bootstrap -->
    <link href="{{  asset('admin_data/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{  asset('admin_data/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{  asset('admin_data/css/animate.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{  asset('admin_data/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body>

 <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="{{ route('login') }}">
            {{ csrf_field() }}
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control {{ $errors->has( config('berger.username') ) ? ' parsley-error' : '' }}"  placeholder="用户"  name="{{ config('berger.username') }}"/>
                @if ($errors->has( config('berger.username') ))
                    <p class="text-danger text-left ">
                        <strong>{{ $errors->first( config('berger.username') ) }}</strong>
                    </p>
                @endif

              </div>
              <div>
                <input type="password" class="form-control {{ $errors->has(config('berger.password')) ? ' parsley-error' : '' }}" placeholder="密码"/ name="{{ config('berger.password') }}">

                @if ($errors->has(config('berger.password')))
                    <p class="text-danger text-left ">
                        <strong>{{ $errors->first(config('berger.password')) }}</strong>
                    </p>
                @endif
              </div>

               <div class="row">
                <div class="col-md-8">
                    <input type="text" class="form-control {{ $errors->has('captcha') ? ' parsley-error' : '' }}"  name="captcha">
                </div>
                <div class="col-md-4">
                    <img style="cursor: pointer;" src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}' + Math.random()">
                </div>


              </div>
                 @if ($errors->has('captcha'))
                    <p class="text-danger text-left ">
                        <strong>{{ $errors->first('captcha') }}</strong>
                    </p>
                @endif

              <div class="checkbox">
                <label class="pull-left">
                  <input type="checkbox" name="remember"> Remember Me
                </label>
              </div>
              <div class="clearfix"></div>
              <br/>
              <div>

                <button type="submit" class="btn btn-primary submit">
                                    Login
                </button>
                <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="{{ route('register')}}" class="to_register"> Create Account </a>

                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
  </body>
</html>