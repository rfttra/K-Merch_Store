<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        return view('dashboard.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('dashboard.orders.view', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('dashboard/orders/')->with('status', "Order Status Updated");
    }

    public function orderHistory()
    {
        $orders = Order::where('status', '1')->get();
        return view('dashboard.orders.history', compact('orders'));
    }
}
