<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    // create a index function below
    public function index(Request $request)
    {
        $search = $request->q;
        // dd($search);
        $products = Product::orWhere('name', 'like', '%' . $search . '%')
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('subCategory', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('brand', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('tags', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest();
        $products = $this->filterResults($request, $products);
        $products = $products->paginate(12);

        $user = auth()->user();
        $wishlist = $user ? $user->wishlist()->pluck('product_id')->toArray() : [];
        //dd($products);
        if ($user) {
            $cart = $user->cart;
        } else {
            $cart_session_id = session()->get('cart_session_id');
            $cart = $cart_session_id ? Cart::where('session_id', $cart_session_id)->first() : null;
        }
        $productInCart = $cart ? $cart->items()->pluck('product_id')->toArray() : [];

        return view('frontend.search.index', compact('search', 'products', 'wishlist', 'productInCart'));
    }

    protected function filterResults($request, $products)
    {
        if ($request !== null && $request->has('sort_by')) {
            if ($request['sort_by'] == 'low_to_high') {
                $products = $products->orderBy('final_price', 'asc');
            } elseif ($request['sort_by'] == 'high_to_low') {
                $products = $products->orderBy('final_price', 'desc');
            } elseif ($request['sort_by'] == 'featured') {
                $products = $products->whereHas('showcases', function ($query) {
                    $query->where('name', 'Featured');
                });
            }
        }

        return $products;
    }
}
