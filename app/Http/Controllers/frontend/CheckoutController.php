<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Traits\Taxable;
use App\Models\CouponUsage;
use Illuminate\Http\Request;
use App\Traits\Transactional;
use App\Lib\Razorpay\Razorpay;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    use Transactional, Taxable;

    public function selectAddress(Request $request, $product_slug = null)
    {
        $user = auth()->user();
        $cartItems = $user->cart ? $user->cart->items()->with('product')->get() : [];
        $productsTotalAmount = 0;
        foreach ($cartItems as $key => $item) {
            if ($item->quantity > $item->product->stock) {
                return redirect()->back('The given product quantity is not available. Please Try after some time.');
            }
            $productsTotalAmount += $item->product->final_price * $item->quantity;
        }
        if ($cartItems) {
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            $userAddresses = $user->userAddresses()->get();
            return view('frontend.order.checkout', compact('userAddresses', 'cartItems', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        return redirect()->back()->with(toast('No Items in your cart to checkout', 'info'));
        // abort(404);
    }

    public function showPaymentPage(Request $request, Razorpay $api)
    {
        return redirect()->back()->with(toast('Work in Progress', 'info'));
        $user = auth()->user();
        $productsArray = null;
        $selectedAddress = $user->userAddresses()->find($request->address);
        if (!$selectedAddress) {
            return redirect()->back()->with(toast('Selected Address is Invalid', 'info'));
        }

        $cartItems = $user->cart->items()->with('product')->get();
        $productsTotalAmount = 0;
        foreach ($cartItems as $key => $item) {
            if ($item->quantity > $item->product->stock) {
                return redirect()->back('The given product quantity is not available. Please Try after some time.');
            }
            $productsTotalAmount += $item->product->final_price * $item->quantity;
        }
        if ($cartItems) {
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            $order = $this->getOrderOrCreateNew($user, $api, $subTotal, $discount, $grandTotal, $cartItems, $selectedAddress);
            return view('frontend.order.payment', compact('selectedAddress', 'cartItems', 'order', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        return redirect()->back()->with(toast('No Items in your cart to checkout', 'info'));
        // abort(404);
    }

    public function handleCallback(Request $request)
    {
        $order = Order::where('api_order_id', $request->razorpay_order_id)->first();
        if(session()->has('coupon')){
            $coupon=session('coupon');
            $coupon_usage=new CouponUsage;
            $coupon_usage->coupon_id=$coupon->id;
            $coupon_usage->order_id=$order->id;
            $coupon_usage->user_id=$order->user_id;
            $coupon_usage->save();
            session()->forget('coupon');
            session()->forget('discount');
        }
        $order->update(['status' => 'completed']);
        return view('frontend.payment-success', compact('order'));
    }

    public function applyCoupon(Request $request)
    {

        $request->validate([
            'coupon' => 'required|string|min:2|max:60',
        ]);
        $coupon = Coupon::findPromoCode($request->coupon);
        // dd($coupon);
        if ($coupon && $coupon->isValid()) {
            session()->has('coupon') ? $this->removeCoupon() : null;
            $cartItems = auth()->user()->cart->items()->with('product')->get();
            $productsTotalAmount = 0;
            foreach ($cartItems as $key => $item) {
                $productsTotalAmount += $item->product->final_price * $item->quantity;
            }
            // dd($productsTotalAmount);
            $discount = $coupon->discount($productsTotalAmount);
            // dd($discount);
            if ($discount >= $productsTotalAmount) {
                return redirect()->route('frontend.cart.checkout')->with(['alert-type' => 'info', 'message' => 'Coupon Not Applicable']);
            }
            session()->put([
                'coupon' => $coupon->code,
                'discount' => $discount,
            ]);
            return redirect()->route('frontend.cart.checkout')->with(toast('Coupon Applied'));
        }
        return redirect()->back()->with(toast('This coupon is invalid', 'error'));
    }

    public function removeCoupon(): \Illuminate\Http\RedirectResponse
    {
        session()->forget('coupon');
        session()->forget('discount');
        return redirect()->back();
    }

    protected function getOrderOrCreateNew($user, Razorpay $api, $subTotal, $discount, $grandTotal, $cartItems, $selectedAddress)
    {
        // dd($user->orders()->whereStatus('initial')->latest()->first()->item);
        // dd($api);
        if ($user->orders()->whereStatus('initial')->exists()) {
            $order = $user->orders()->whereStatus('initial')->latest()->first();
            $apiOrder = $api->createOrder((int)$grandTotal * 100);
            $order->update([
                'api_order_id' => $apiOrder['id'],
                'sub_total' => $subTotal,
                'total_amount' => $grandTotal,
                'discount_amount' => $discount,
                'street_address' => $selectedAddress->street_address,
                'landmark' => $selectedAddress->landmark,
                'city' => $selectedAddress->city,
                'state' => $selectedAddress->state,
                'country' => $selectedAddress->country,
                'postal_code' => $selectedAddress->postal_code
            ]);
            optional($order->items()->delete());
            self::createOrderItems($order, $cartItems);
        } else {
            $apiOrder = $api->createOrder((int)$grandTotal * 100);
            $order = $this->createOrder($grandTotal, [
                'api_order_id' => $apiOrder['id'],
                'discount' => $discount
            ], $selectedAddress);
            self::createOrderItems($order, $cartItems);
        }
        return $order;
    }
}
