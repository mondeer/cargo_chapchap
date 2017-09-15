<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Sentinel;

class OrdersController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->get('status');
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
        // dd($orders->toSql());

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

    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit')->with(compact('order'));
    }

    public function update(Request $request, $id)
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
