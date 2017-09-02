<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DriverMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard='taxiDriver')
    {
        if(Auth::guard($guard)->guest()){
            if($request->ajax() || $request->wantsJson()){
                return response('Unauthorized');
            }else{
                return redirect()->guest('driver/login');
            }
        }
        return $next($request);
    }
}