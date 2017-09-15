<?php

namespace App\Http\Middleware;

use Closure;

class CheckoutAddressStepDone
{

     public function handle($request, Closure $next)
     {
         if (!session()->has('checkout.address')) {
            return redirect('checkout/address');
         }

         return $next($request);
     }
}
