<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->routeIs('user.*'))
            {
                if(!Auth::guard('web')->check())
                {
                     return route('user.login'); 
                }
            }
            if($request->routeIs('admin.*'))
            {
                if(!Auth::guard('admin')->check())
                {
                    return route('admin.login');   
                }
            }
            if($request->routeIs('seller.*'))
                {
                    if(!Auth::guard('seller')->check())
                        {
                           return route('seller.login'); 
                        }
                }
        }
    }
}