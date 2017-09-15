<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginCtrl extends Controller
{
    public function login() {
      return view('auths.login');
    }

    public function postLogin(Request $request) {
      $user = Sentinel::forceAuthenticate($request->all());
      if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
        return redirect('/orders');
      } elseif (Sentinel::getUser()->roles()->first()->slug == 'customer') {
        return redirect('/home/orders');
      } else {
        return redirect('/');
      }
    }
    public function logout() {
      Sentinel::logout();
      return redirect('/');
    }
}
