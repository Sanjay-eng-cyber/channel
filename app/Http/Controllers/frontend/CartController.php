<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function index(Request $request)
    {
        // $user = auth()->user();
        // if ($user) {
        //     $cart = $user->cart;
        //     // dd($cart);
        // } else {
        //     $cart_session_id = session()->get('cart_session_id');
        //     $cart = $cart_session_id ? Cart::where('session_id', $cart_session_id)->first() : null;
        //     // dd($cart);
        // }
        // $cartItems = $cart ? $cart->items()->paginate(10) : [];
        // $subTotal = 0;
        // foreach ($cartItems as $cart) {
        //     $subTotal = $subTotal += $cart->product->final_price * $cart->quantity;
        // }
        // //dd($subTotal);
        // return view('frontend.cart', compact('cart', 'cartItems', 'subTotal'));
        return view('frontend.cart');
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        // dd($product);
        $user = auth()->user();
        if ($user) {
            $cart = Cart::updateOrCreate([
                'user_id' => $user->id
            ]);
            // dd($cart);
        } else {
            $cart_session_id = session()->get('cart_session_id');
            if (!$cart_session_id) {
                $cart_session_id = now()->format('dmyhis') . rand(100, 999);
                session()->put('cart_session_id', now()->format('dmyhis') . rand(100, 999));
            }
            $cart = Cart::updateOrCreate([
                'session_id' => $cart_session_id
            ]);
        }
        // Log::info("Cart Id: " . $cart->id);

        $productInCart = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();
        if ($productInCart) {
            $productInCart->delete();
            return response()->json(['status' => true, 'addToCart' => 0, 'count' => $cart->items()->count(), 'message' => 'Product Removed from Cart']);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id
            ]);
            return response()->json(['status' => true, 'addToCart' => 1, 'count' => $cart->items()->count(), 'message' => 'Product Added to Cart']);
        }
    }

    public function delete($id)
    {
        //$user = auth()->user();
        $cart = CartItem::findOrFail($id);
        //dd($cart);
        if ($cart->delete()) {
            return redirect()->route('frontend.cart.index')->with(['alert-type' => 'success', 'message' => 'Cart Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function getCartItemsApi()
    {
        $user = auth()->user();
        if ($user) {
            $cart = $user->cart;
            // dd($cart);
        } else {
            $cart_session_id = session()->get('cart_session_id');
            $cart = $cart_session_id ? Cart::where('session_id', $cart_session_id)->first() : null;
            // dd($cart);
        }
        $cartItems = $cart ? $cart->items()->with('product')->get() : [];
        $cartItemsArr = [];
        $subTotal = 0;
        foreach ($cartItems as $key => $item) {
            // dd($item->product);
            $cartItemsArr[$key]['id'] = $item->product->id;
            $cartItemsArr[$key]['item_id'] = $item->id;
            $cartItemsArr[$key]['name'] = $item->product->name;
            $cartItemsArr[$key]['slug'] = $item->product->slug;
            $cartItemsArr[$key]['thumbnail_image'] = asset('storage/images/products/' . $item->product->thumbnail_image);
            // $cartItemsArr[$key]['thumbnail_image'] = $item->product->thumbnail_image;
            $cartItemsArr[$key]['mrp'] = $item->product->mrp;
            $cartItemsArr[$key]['final_price'] = $item->product->final_price;
            $cartItemsArr[$key]['stock'] = $item->product->stock ? true : false;
            $cartItemsArr[$key]['link'] = route('frontend.p.show', $item->product->slug);
            $cartItemsArr[$key]['quantity'] = $item->quantity;
            $cartItemsArr[$key]['total_price'] =  $item->product->final_price * $item->quantity;
            $subTotal = $subTotal += $item->product->final_price * $item->quantity;
        }
        // dd($cartItemsArr);
        return response()->json(['status' => true, 'cartItems' => $cartItemsArr, 'subTotal' => $subTotal]);
    }

    public function increaseItemQuantity(Request $request)
    {
        // dd($request->product_id);
        $product = Product::findOrFail($request->product_id);
        $user = auth()->user();
        if ($user) {
            $cart = Cart::updateOrCreate([
                'user_id' => $user->id
            ]);
            // dd($cart);
        } else {
            $cart_session_id = session()->get('cart_session_id');
            if (!$cart_session_id) {
                $cart_session_id = now()->format('dmyhis') . rand(100, 999);
                session()->put('cart_session_id', now()->format('dmyhis') . rand(100, 999));
            }
            $cart = Cart::updateOrCreate([
                'session_id' => $cart_session_id
            ]);
        }

        $productInCart = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->with('product')->first();
        if ($productInCart) {
            if ($product->stock < $productInCart->quantity + 1) {
                return response()->json(['status' => false,  'message' => 'Item Quantity Exceeds Stock']);
            }
            $productInCart->update(['quantity' => $productInCart->quantity + 1]);
            $subTotal = $cart->items()->with('product')->get()->sum(function ($item) {
                return $item->product->final_price * $item->quantity;
            });
            return response()->json(['status' => true, 'quantity' => $productInCart->quantity, 'total_price' => $productInCart->product->final_price * $productInCart->quantity, 'subTotal' => $subTotal]);
        } else {
            return response()->json(['status' => false,  'message' => 'Product Not In Cart']);
        }
    }

    public function decreaseItemQuantity(Request $request)
    {
        // dd($request->product_id);
        $product = Product::findOrFail($request->product_id);
        $user = auth()->user();
        if ($user) {
            $cart = Cart::updateOrCreate([
                'user_id' => $user->id
            ]);
            // dd($cart);
        } else {
            $cart_session_id = session()->get('cart_session_id');
            if (!$cart_session_id) {
                $cart_session_id = now()->format('dmyhis') . rand(100, 999);
                session()->put('cart_session_id', now()->format('dmyhis') . rand(100, 999));
            }
            $cart = Cart::updateOrCreate([
                'session_id' => $cart_session_id
            ]);
        }

        $productInCart = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();
        if ($productInCart->quantity == 1) {
            return response()->json(['status' => false,  'message' => 'Please Remove Product From Cart']);
        }
        if ($productInCart) {
            $productInCart->update(['quantity' => $productInCart->quantity - 1]);
            $subTotal = $cart->items()->with('product')->get()->sum(function ($item) {
                return $item->product->final_price * $item->quantity;
            });
            return response()->json(['status' => true, 'quantity' => $productInCart->quantity, 'total_price' => $productInCart->product->final_price * $productInCart->quantity, 'subTotal' => $subTotal]);
        } else {
            return response()->json(['status' => false,  'message' => 'Product Not In Cart']);
        }
    }

    public function removeItem(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $cart = $user->cart;
        } else {
            $cart_session_id = session()->get('cart_session_id');
            $cart = $cart_session_id ? Cart::where('session_id', $cart_session_id)->first() : null;
        }
        $cartItem = $cart ? CartItem::where('cart_id', $cart->id)->findOrFail($request->item_id) : null;
        if ($cartItem && $cartItem->delete()) {
            return response()->json(['status' => true, 'message' => "Product Removed From Cart"]);
        }
        return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
    }
}
