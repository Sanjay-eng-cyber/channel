<?php

namespace App\Http\Controllers\frontend;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function store(Request $request, $product_slug)
    {
        $product = Product::where('slug', $product_slug)->firstOrFail();
        // dd($request);
        $request->validate([
            'title' => 'required|min:3|max:120',
            'body' => 'required|min:3|max:1000',
            'rating' => 'required|numeric|min:1|max:5',
        ]);
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $product->id;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->rating = $request->rating;
        if ($review->save()) {
            $reviews = $product->reviews()->avg('rating');
           $avgRating = number_format($reviews, 1);
           //dd($avgRating);
           $product->update(['rating' => $avgRating]);
            return redirect()->back()->with(toast('Review Added Successfully', 'success'));
        }
        return redirect()->back()->with(toast('Something Went Wrong', 'error'))->withInput();
    }
}
