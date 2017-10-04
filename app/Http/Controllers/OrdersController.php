<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Sentinel;

class OrdersController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->get('status');/*this is from the from form used to query Order model*/
        $orders = Order::where('status', 'LIKE', '%'.$status.'%');
        if ($request->has('q')) {
            $q = $request->get('q');
            $orders = $orders->where(function($query) use ($q) {
                $query->where('id', $q)
                    ->orWhereHas('user', function($user) use ($q) {
                        $user->where('name', 'LIKE', '%'.$q.'%');
                    });
            });
        }
        // after getting the orders, we order them in descending order with respect to updated_at column in the orders table
        $orders = $orders->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders', 'status', 'q'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)/*this function edit takes in the parameter id*/
    {
        $order = Order::find($id);/*we find record with $id picked from blade*/
        return view('orders.edit')->with(compact('order'));
    }

    public function update(Request $request, $id)/*after edit function above we now post changes to db*/
    {
        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect('/orders');
    }

    public function destroy($id)
    {
        //
    }
}
