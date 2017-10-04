<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ProductlinkCtrl extends Controller
{
  public function index() {
    return view('client.productlink');
  }
  public function shop(Request $request) {
    $product_links = new Shop();
    $mobile = '+254'.$request->input('phone');
    $product_links->product_link = $request->input('product_link');
    $product_links->quantity = $request->input('quantity');
    $product_links->first_name = $request->input('first_name');
    $product_links->last_name = $request->input('last_name');
    $product_links->email = $request->input('email');
    $product_links->phone = $mobile;
    $product_links->delivery_address = $request->input('delivery_address');
    $product_links->save();
    return redirect()->back();
  }
  public function adminView() {
    $product_links = Shop::all();
    return view('admin.productlink.view')->with('product_links', $product_links);
  }
}
