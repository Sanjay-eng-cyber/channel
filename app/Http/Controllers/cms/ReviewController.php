<?php

namespace App\Http\Controllers\cms;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function Index(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $reviews = $product->reviews()->latest()->paginate(10);
        return view('backend.review.index', compact('reviews', 'product'));
    }

    public function Show(Request $request, $product_id, $review_id)
    {
        $product = Product::findOrFail($product_id);
        $reviews = $product->reviews()->findOrFail($review_id);
        return view('backend.review.show', compact('reviews', 'product'));
    }

    public function Edit($product_id, $review_id)
    {
        $product = Product::findOrFail($product_id);
        $reviews = $product->reviews()->findOrFail($review_id);
        // dd($medias);
        return view('backend.review.edit', compact('product', 'reviews'));
    }

    public function Update(Request $request, $product_id, $review_id)
    {
        $product = Product::findOrFail($product_id);
        $reviews = $product->reviews()->findOrFail($review_id);
        $request->validate([
            'title' => 'required|min:3|max:120',
            'body' => 'required|min:3|max:1000',
            'rating' => 'required|numeric|min:1|max:5',
        ]);
        $reviews->title = $request->title;
        $reviews->rating = $request->rating;
        $reviews->body = $request->body;
        $reviews->save();
        return redirect()->route('backend.product.review', $product_id)->with(['alert-type' => 'success', 'message' => 'Review Updated Successfully']);
    }

    public function Destroy($product_id, $review_id)
    {
        $product = Product::findOrFail($product_id);
        $reviews = $product->reviews()->findOrFail($review_id);
        if ($reviews->delete()) {
            return redirect()->route('backend.product.review', $product_id)->with(['alert-type' => 'success', 'message' => 'Review Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
