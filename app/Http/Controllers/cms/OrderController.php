<?php

namespace App\Http\Controllers\cms;

use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::latest();
        $orders = $this->filterResults($request, $orders);
        $orders = $orders->paginate(10);
        return view('backend.order.index', compact('orders'));
    }

    public function orderItems($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $order_items = $order->items()->with('product')->latest()->paginate(10);
        // dd( $order_items );
        return view('backend.order.order_items', compact('order', 'order_items'));
    }

    protected function filterResults($request, $orders)
    {
        if ($request !== null && $request->has('status') && $request['status'] == 'initial') {
            $orders = $orders->where('status', '=', 'initial');
        } elseif ($request !== null && $request->has('status') && $request['status'] == 'failed') {
            $orders = $orders->where('status', '=', 'failed');
        } elseif ($request !== null && $request->has('status') && $request['status'] == 'completed') {
            $orders = $orders->where('status', '=', 'completed');
        }
        return $orders;
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $transaction = $order->transactions()->orderBy('status', 'asc')->first();
        $delivery = $order->deliveries()->latest()->first();
        // dd( $deliveries );
        return view('backend.order.show', compact('order', 'transaction', 'delivery'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        // dd( $order );
        return view('backend.order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'refund_status' => 'nullable|in:pending,created,processed',
            'refund_amount' => 'nullable|numeric|min:1|max:100000',
            'refund_date' => 'nullable|date',
            'refund_note' => 'nullable|min:3|max:150',
        ]);

        $order = Order::findOrFail($id);
        $order->refund_status = $request->refund_status;
        $order->refund_amount = $request->refund_amount;
        $order->refund_date = $request->refund_date;
        $order->refund_note = $request->refund_note;
        if ($order->save()) {
            return redirect()->route('backend.order.index')->with(['alert-type' => 'success', 'message' => 'Order Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
