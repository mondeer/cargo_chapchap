<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class CustomerMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Sentinel::check() && Sentinel::getUser()->roles->first()->slug=='customer')
            return $next($request);
        else 
            return redirect()->back();
    }
}
