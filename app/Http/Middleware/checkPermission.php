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
                $permission = 'admin.'.$model.'.list';
                break;
            case 'admin.'.$model.'.create':
            case 'admin.'.$model.'.store':
                $permission = 'admin.'.$model.'.add';
                break;
            case 'admin.'.$model.'.edit':
            case 'admin.'.$model.'.update':
            case 'admin.'.$model.'.store':
            case 'admin.'.$model.'.action':
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
            abort(500,'121212122121');
        }

        return $next($request);
    }
}
