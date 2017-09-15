<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Order;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function viewOrders(Request $request)
    {
        $q = $request->get('q');
        $status = $request->get('status');
        $user = Sentinel::getUser()->id;
        $orders = Order::where('user_id', $user)
            ->where('id', 'LIKE', '%'. $q . '%')
            ->where('status', 'LIKE', '%' . $status . '%')
            ->orderBy('updated_at')
            ->paginate(5);
        return view('customer.view-orders')->with(compact('orders', 'q', 'status'));
    }
}
