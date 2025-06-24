<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->where('status', 'completed')->with('items', 'deliveries')->latest()->paginate(10);
        // dd($orders);
        return view('frontend.order.index', compact('orders'));
    }

    public function show($order_no)
    {
        // return $order_id;
        $user = auth()->user();
        $order = Order::where('status', 'completed')->where('user_id', $user->id)->with('items')->where('order_no', $order_no)->firstOrFail();
        // dd($order);
        $gst = gst($order->total_amount);
        // dd($gst);
        $delivery = $order->deliveries()->first();
        return view('frontend.order.show', compact('order', 'delivery', 'gst'));
    }

    public function cancel($order_id)
    {
        $user = auth()->user();
        $order = Order::whereStatus('completed')->where('user_id', $user->id)->with('deliveries')->findOrFail($order_id);
        // dd($order);
        if ($order->deliveries->count()) {
            return redirect()->back()->with(toast('This Order has been processed already', 'info'));
        }
        if ($order->update(['status' => 'cancelled'])) {
            return redirect()->back()->with(toast('Order has been cancelled', 'success'));
        }
        return redirect()->back()->with(toast('Something Went Wrong', 'error'));
    }
}
