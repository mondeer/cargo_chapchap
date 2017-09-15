<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class Role
{

    public function handle($request, Closure $next, $role)
    {
      if (Sentinel::getUser()->can($role . '-access')) {
          return $next($request);
      }
      return response('Unauthorized.', 401);
    }
}
