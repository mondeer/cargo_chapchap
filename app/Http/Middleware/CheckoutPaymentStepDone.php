<?php

namespace App\Http\Middleware;

use Closure;

class CheckoutPaymentStepDone
{
  
     public function handle($request, Closure $next)
     {
         if (!session()->has('order')) {
            return redirect('checkout/payment');
         }

         return $next($request);
     }
}
