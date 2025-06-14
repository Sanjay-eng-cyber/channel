<?php

namespace App\Http\Controllers\frontend;

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
        $products = Product::where('category_id', $category->id)->where('sub_category_id', $sub_category->id);
        //dd($products);
        $products = $products->latest()->paginate(10);
        //dd($products);
        return view('frontend.product.index', compact('products', 'category'));
    }
}
