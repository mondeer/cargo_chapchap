<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class CheckoutLoginStepDone
{
  
     public function handle($request, Closure $next)
     {
         if (Sentinel::guest() && !session()->has('checkout.email')) {
            return redirect('checkout/login');
         }

         return $next($request);
     }
}
