<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;
use Sentinel;
use App\Support\CartService;

class Authenticate
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function handle($request, Closure $next)
    {
        // if (Auth::guard($guard)->guest()) {
        //     if ($request->ajax() || $request->wantsJson()) {
        //         return response('Unauthorized.', 401);
        //     } else {
        //         return redirect()->guest('login');
        //     }
        // }

        if (Sentinel::inRole('customer')) {
            
            // merge cart from cookie to db
            // send response while remove cart from cookie
            $cookie = $this->cart->merge();
            return $next($request)->withCookie($cookie);
        }

        return $next($request);
    }
}
