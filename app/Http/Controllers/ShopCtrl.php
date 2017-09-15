<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopCtrl extends Controller
{
  public function index() {
    return view('client.shop');
  }
  public function shop(Request $request) {
    $shopping = new Shop();
    $mobile = '+254'.$request->input('phone');
    $shopping->product_link = $request->input('product_link');
    $shopping->quantity = $request->input('quantity');
    $shopping->first_name = $request->input('first_name');
    $shopping->last_name = $request->input('last_name');
    $shopping->email = $request->input('email');
    $shopping->phone = $mobile;
    $shopping->delivery_address = $request->input('delivery_address');
    $shopping->save();
    return redirect()->back();
  }
  public function adminView() {
    $shopping = Shop::all();
    return view('admin.shopping.view')->with('shopping', $shopping);
  }
}
