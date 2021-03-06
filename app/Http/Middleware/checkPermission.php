<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Exception;
class checkPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$model)
    {
        $routeName = Route::currentRouteName();

        $permission = '';
        switch ( $routeName ) {
            case 'admin.'.$model.'.index':
            case 'admin.'.$model.'.show':
            case 'admin.'.$model.'.create':
            case 'admin.'.$model.'.edit':
                $permission = 'admin.'.$model.'.list';
                break;
            case 'admin.'.$model.'.store':
                $permission = 'admin.'.$model.'.add';
                break;
            case 'admin.'.$model.'.update':
            case 'admin.'.$model.'.store':
                $permission = 'admin.'.$model.'.edit';
                break;
            case 'admin.'.$model.'.delete':
                $permission = 'admin.'.$model.'.delete';
                break;
            default:
                # code...
                break;
        }

        if(!$request->user()->can($permission)){
            $message = '不好意思 您没该权限';
            return response()->view('page_500',compact('message'));
        }

        return $next($request);
    }
}
