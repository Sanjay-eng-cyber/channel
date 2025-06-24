<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        // dd($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productSlug)
    {
        $user = auth()->user();
        $product = Product::where('slug', $productSlug)->with('medias', 'brand')->firstOrFail();
        $product_attributes = $product->ProductAttribute()->with('attribute', 'value')->latest()->get();
        // dd($product_attributes);
        $category = $product->category;
        $subCategory = $product->subCategory;
        // dd($product);
        $attributes = $product->attributes()->get();
        // dd($attributes);
        $reviews = $product->reviews()->with('user')->latest();
        $reviewsCount = $reviews->count();
        $reviews = $reviews->paginate(5);

        $reviewRatingAvg =  number_format($reviews->avg('rating'), 1);

        $ratingsArray = $product->reviews()->select('rating', \DB::raw('count(id) as count'))
            ->groupBy('rating')
            ->get()->toArray();
        foreach ($ratingsArray as $rA) {
            $ratings[$rA['rating']] = $rA['count'];
        }
        $ratingsArr = [];
        $ratingsArr[1] = isset($ratings[1]) ? (($ratings[1] / $reviewsCount) * 100) : 0;
        $ratingsArr[2] = isset($ratings[2]) ? (($ratings[2] / $reviewsCount) * 100) : 0;
        $ratingsArr[3] = isset($ratings[3]) ? (($ratings[3] / $reviewsCount) * 100) : 0;
        $ratingsArr[4] = isset($ratings[4]) ? (($ratings[4] / $reviewsCount) * 100) : 0;
        $ratingsArr[5] = isset($ratings[5]) ? (($ratings[5] / $reviewsCount) * 100) : 0;
        // dd($ratings);

        $relatedProducts = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)->latest()->limit(12)->get();
        // dd($relatedProducts);

        if ($user) {
            $cart = $user->cart;
        } else {
            $cart_session_id = session()->get('cart_session_id');
            $cart = $cart_session_id ? Cart::where('session_id', $cart_session_id)->first() : null;
        }
        $productInCart = $cart ? $cart->items()->pluck('product_id')->toArray() : [];
        $wishlist = $user ? $user->wishlist()->pluck('product_id')->toArray() : [];

        $tags = $product->tags()->pluck('name')->toArray();
        // dd(implode(', ', $tags));

        return view('frontend.product.show', compact('user', 'product', 'product_attributes', 'category', 'subCategory', 'reviews', 'relatedProducts', 'reviewRatingAvg', 'ratingsArr', 'productInCart', 'wishlist', 'tags'));
    }

    public function checkout(Request $request, $product_slug)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'nullable|numeric|min:1|max:50'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(toast('Product Quantity Error.', 'error'));
        }
        $product = Product::whereSlug($product_slug)->first();
        // dd($product);
        if ($product) {
            if ($product->stock < $request->quantity) {
                return redirect()->back()->with(toast('Product Quantity Exceeds Stock.', 'error'));
            }
            $cart = getUserCart();
            $productInCart = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();
            if ($productInCart) {
                $productInCart->update(['quantity' => $request->quantity]);
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity
                ]);
            }
            return redirect()->route('frontend.cart.index');
        }
        return redirect()->back()->with(toast('Something went Wrong, Please try again later.', 'error'));
    }

    // public function storeReview(Request $request, $product_slug)
    // {
    //     $product = Product::where('slug', $product_slug)->firstOrFail();

    //     $review = new Review();
    //     $review->user_id = auth()->user()->id;
    //     $review->product_id = $product->id;
    //     $review->title = $request->title;
    //     $review->body = $request->body;
    //     if ($review->save()) {
    //         return redirect()->back()->with(toast('Review Added Successfully', 'success'));
    //     }
    //     return redirect()->back()->with(toast('Something Went Wrong', 'error'))->withInput();
    // }
}
