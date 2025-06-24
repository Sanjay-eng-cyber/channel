<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::latest()->paginate(10);
        // dd($categories);
    }

    public function show($catSlug, Request $request)
    {
        $category = Category::where('slug', $catSlug)->firstOrFail();
        $products = $category->products()->latest();
        $products = $this->filterResults($request, $products);
        $products = $products->paginate(16);

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

        return view('frontend.category.index', compact('products', 'category', 'wishlist', 'productInCart'));
    }

    protected function filterResults($request, $products)
    {

        if ($request !== null && $request->has('sort_by')) {
            if ($request['sort_by'] == 'low_to_high') {
                $products = $products->orderBy('mrp', 'asc');
            } elseif ($request['sort_by'] == 'high_to_low') {
                $products = $products->orderBy('mrp', 'desc');
            } elseif ($request['sort_by'] == 'featured') {
                $products = $products->whereHas('showcases', function ($query) {
                    $query->where('name', 'Featured');
                });
            }
        }

        return $products;
    }
}
