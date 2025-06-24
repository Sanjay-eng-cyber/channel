<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function show($categorySlug, $subCategorySlug, Request $request)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $sub_category = SubCategory::where('slug', $subCategorySlug)->firstOrFail();

        //dd($products);
        $products = $sub_category->products()->latest();
        $products = $this->filterResults($request, $products);
        $products = $products->paginate(16);

        $user = auth()->user();
        $wishlist = $user ? $user->wishlist()->pluck('product_id')->toArray() : [];
        if ($user) {
            $cart = $user->cart;
        } else {
            $cart_session_id = session()->get('cart_session_id');
            $cart = $cart_session_id ? Cart::where('session_id', $cart_session_id)->first() : null;
        }
        $productInCart = $cart ? $cart->items()->pluck('product_id')->toArray() : [];

        return view('frontend.sub-category.index', compact('products', 'category', 'sub_category', 'wishlist', 'productInCart'));
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
