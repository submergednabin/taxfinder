<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfDriverLoggedIn
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
        if(Auth::guard($guard)->check()){
            return redirect('driver/dashboard');
        }
        return $next($request);
        return $next($request);
    }
}
