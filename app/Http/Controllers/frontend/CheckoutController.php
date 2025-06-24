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
use Seshac\Shiprocket\Shiprocket;
use Illuminate\Support\Facades\Log;
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
                return redirect()->back()->with(toast('Some products are currently out of stock. Please try again later or remove those products from your cart.', 'info'));
            }
            $productsTotalAmount += $item->product->final_price * $item->quantity;
        }
        if ($cartItems) {
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            $userAddresses = $user->userAddresses()->orderBy('type', 'asc')->get();
            return view('frontend.order.checkout', compact('userAddresses', 'cartItems', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        return redirect()->back()->with(toast('There are no items in your cart to checkout.', 'info'));
        // abort(404);
    }

    public function showPaymentPage(Request $request, Razorpay $api)
    {
        // return redirect()->back()->with(toast('Work in Progress', 'info'));
        $user = auth()->user();
        $productsArray = null;
        $selectedAddress = $user->userAddresses()->find($request->address);
        if (!$selectedAddress) {
            return redirect()->back()->with(toast('The selected address is invalid.', 'info'));
        }
        // dd($selectedAddress->postal_code);

        $token = getShiprocketToken();

        $checkServiceability = Shiprocket::courier($token)->checkServiceability([
            'pickup_postcode' => env('APP_POSTAL_CODE'),
            'delivery_postcode' => (int)$selectedAddress->postal_code,
            'cod' => 0,
            'weight' => 2
        ]);

        // dd($checkServiceability);
        if (!isset($checkServiceability['status']) || $checkServiceability['status']  !== 200) {
            Log::info("checkServiceability");
            Log::info($checkServiceability);
            return redirect()->back()->with(toast("This item cannot be delivered to the selected address.", 'info'));
        }

        $cartItems = $user->cart->items()->with('product')->get();
        $productsTotalAmount = 0;
        foreach ($cartItems as $key => $item) {
            if ($item->quantity > $item->product->stock) {
                return redirect()->back(toast('Some products are currently out of stock. Please try again later or remove those products from your cart.', 'info'));
            }
            $productsTotalAmount += $item->product->final_price * $item->quantity;
        }
        if ($cartItems) {
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            $order = $this->getOrderOrCreateNew($user, $api, $subTotal, $discount, $grandTotal, $cartItems, $selectedAddress);
            return view('frontend.order.payment', compact('selectedAddress', 'cartItems', 'order', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        return redirect()->back()->with(toast('There are no items in your cart to checkout.', 'info'));
        // abort(404);
    }

    public function applyCoupon(Request $request)
    {

        $request->validate([
            'coupon' => 'required|string|min:2|max:60',
        ]);
        $coupon = Coupon::where('code', $request->coupon)->first();
        // dd($coupon->isValid());
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
            if ($productsTotalAmount < $coupon->min_order_amount) {
                return redirect()->route('frontend.cart.checkout')->with(['alert-type' => 'info', 'message' => 'This coupon is applicable to orders with a minimum value of Rs ' . (int)$coupon->min_order_amount . ' only.']);
            }
            if ($discount >= $productsTotalAmount) {
                return redirect()->route('frontend.cart.checkout')->with(['alert-type' => 'info', 'message' => 'The given coupon is not applicable.']);
            }
            session()->put([
                'coupon' => $coupon,
                'discount' => $discount,
            ]);
            return redirect()->route('frontend.cart.checkout')->with(toast('Coupon Applied'));
        }
        return redirect()->back()->with(toast('The given coupon is invalid', 'error'));
    }

    public function removeCoupon(): \Illuminate\Http\RedirectResponse
    {
        session()->forget('coupon');
        session()->forget('discount');
        return redirect()->back()->with(toast('Coupon has been removed.', 'error'));
    }

    public function handleCallback(Request $request)
    {
        $order = Order::where('api_order_id', $request->razorpay_order_id)->first();
        if (session()->has('coupon')) {
            $coupon = session('coupon');
            $coupon_usage = new CouponUsage;
            $coupon_usage->coupon_id = $coupon->id;
            $coupon_usage->order_id = $order->id;
            $coupon_usage->user_id = $order->user_id;
            $coupon_usage->save();
            session()->forget('coupon');
            session()->forget('discount');
        }
        $userCart = auth()->user()->cart;
        optional($userCart->items()->delete());
        $transaction = $order->transactions()->whereStatus('completed')->latest()->first();
        return view('frontend.payment-success', compact('order', 'transaction'));
    }

    protected function getOrderOrCreateNew($user, Razorpay $api, $subTotal, $discount, $grandTotal, $cartItems, $selectedAddress)
    {
        // dd($user->orders()->whereStatus('initial')->latest()->first()->item);
        // dd($api);
        if ($user->orders()->whereStatus('initial')->exists()) {
            $order = $user->orders()->whereStatus('initial')->latest()->first();
            $apiOrder = $api->createOrder((int)$grandTotal * 100);
            $order->update([
                'order_no' => generateOrderNo(),
                'api_order_id' => $apiOrder['id'],
                'sub_total' => $subTotal,
                'total_amount' => $grandTotal,
                'discount_amount' => $discount,
                'address_name' => $selectedAddress->name,
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
                'order_no' => generateOrderNo(),
                'api_order_id' => $apiOrder['id'],
                'sub_total' => $subTotal,
                'total_amount' => $grandTotal,
                'discount_amount' => $discount
            ], $selectedAddress);
            self::createOrderItems($order, $cartItems);
        }
        return $order;
    }
}
