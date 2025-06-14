<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;

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
        dd($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productSlug)
    {
        $product = Product::where('slug', $productSlug)->firstOrFail();
        $cProducts = Product::where('id', '!=', $product->id)->where('connection_no', $product->connection_no)->get();
        $variants = [];
        $attributes = $product->attributes()->get();
        // dd($attributes);
        $similarProducts = Product::where('connection_no', $product->connection_no)->get();
        // dd($similarProducts);
        foreach ($attributes as $attribute) {
            // echo $attribute->name . '<br>';
            foreach ($similarProducts as $similarProduct) {
                if ($similarProduct->values()->where('product_attributes.attribute_id', $attribute->id)->first()) {
                    // echo $similarProduct->values()->where('product_attributes.attribute_id', $attribute->id)->first()->name . '<br>';
                }
                // dd($similarProduct->values()->where('product_attributes.attribute_id', $attribute->id)->first());
            }
        }

        // $attributes = $product->attributes()->with('values')->get();
        // dd('stop');
        // dd($attributes);

        $reviews = $product->reviews()->latest();
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
        return view('frontend.product.show', compact('product', 'reviews', 'relatedProducts', 'cProducts', 'reviewRatingAvg', 'ratingsArr', 'attributes', 'similarProducts'));
    }

    public function checkout(Request $request, $product_slug)
    {
        $product = Product::whereSlug($product_slug)->first();
        if ($product) {
            $user = auth()->user();
            if ($user) {
                $cart = Cart::updateOrCreate([
                    'user_id' => $user->id
                ]);
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
