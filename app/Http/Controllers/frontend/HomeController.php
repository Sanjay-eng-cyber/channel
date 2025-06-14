<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Showcase;

class HomeController extends Controller
{
    public function index()
    {
        $middleSlider = Slider::where('type', 'middle slider')->first();
        $leftSliders = Slider::where('type', 'left slider')->get();
        $rightSliders = Slider::where('type', 'right slider')->get();

        $featured = Showcase::whereName('Featured')->first();
        $featured_products = $featured ? $featured->products()->latest()->get() : [];

        $best_seller = Showcase::whereName('Best Seller')->first();
        $best_seller_products = $best_seller ? $best_seller->products()->latest()->get() : [];

        $skin = Category::where('slug', 'skin')->first();
        $popularSkinProducts = $skin ? $skin->products()->orderBy('rating', 'desc')->limit(16)->get() : [];
        $latestSkinProducts = $skin ? $skin->products()->latest()->limit(16)->get() : [];

        $fragrances = Category::where('slug', 'fragrances')->first();
        $popularFragrancesProducts = $fragrances ? $fragrances->products()->orderBy('rating', 'desc')->limit(16)->get() : [];
        $latestFragrancesProducts = $fragrances ? $fragrances->products()->latest()->limit(16)->get() : [];

        $home_decor = Category::where('slug', 'home-decor')->first();
        $homeDecorProducts = $home_decor ? $home_decor->products()->limit(16)->get() : [];
        $latestHomeDecorProducts = $home_decor ? $home_decor->products()->latest()->limit(16)->get() : [];

        $cProduct = Product::where('connection_no', 457820)->get();
        // dd($cProduct);

        // dd($latestSkinProducts, $latestFragrancesProducts, $latestHomeDecorProducts);

        return view('frontend.index', compact('middleSlider', 'leftSliders', 'rightSliders', 'featured_products', 'best_seller_products', 'popularSkinProducts', 'latestSkinProducts', 'popularFragrancesProducts', 'latestFragrancesProducts', 'homeDecorProducts', 'latestHomeDecorProducts'));
    }
}
