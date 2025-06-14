<?php

namespace App\Http\Controllers\cms;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index()
    {
        $users = User::count();
        $brand = Brand::count();
        $category = Category::count();
        $subCategory = SubCategory::count();
        $products = Product::count();
        return view('backend.statistics.index', compact('users','brand','category','subCategory','products'));
    }
}
