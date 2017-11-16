<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Exception;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    public $name;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->name = config('berger.username');
    }

    public function login(Request $request)
    {
        $message = [
            'name.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '验证码不正确',
        ];
        request()->validate([
            'name' => 'required',
            'password' => 'required',
            'captcha' =>'required|captcha'
        ],$message);

        $user_id  = DB::table('users')->where('name',$request->name)->first()->id;
        $role_id = DB::table('role_user')->where('user_id',$user_id)->first()->role_id;

        $permission = DB::table('permission_role')
            ->leftJoin('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->where('permissions.display_name','后台登录')
            ->where('role_id',$role_id)
            ->first();
        if(empty($permission)){
            abort(500,'没有权限');
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        return $this->name;
    }

}
