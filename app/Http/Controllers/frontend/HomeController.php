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
        $leftSliders = Slider::where('type', 'left slider')->first();
        $middleSlider = Slider::where('type', 'middle slider')->first();
        $rightSliders = Slider::where('type', 'right slider')->get();

        $featured = Showcase::whereName('Featured')->first();
        $featured_products = $featured ? $featured->products()->latest()->limit(16)->get() : [];

        $best_seller = Showcase::whereName('Best Seller')->first();
        $best_seller_products = $best_seller ? $best_seller->products()->latest()->limit(16)->get() : [];

        $skin = Category::where('slug', 'skin')->first();
        $popularSkinProducts = $skin ? $skin->products()->orderBy('rating', 'desc')->limit(16)->get() : [];
        $latestSkinProducts = $skin ? $skin->products()->latest()->limit(16)->get() : [];

        $personal_care = Category::where('slug', 'personal-care')->first();
        $popularPersonalCareProducts = $personal_care ? $personal_care->products()->orderBy('rating', 'desc')->limit(16)->get() : [];
        $latestPersonalCareProducts = $personal_care ? $personal_care->products()->latest()->limit(16)->get() : [];

        $hair_care = Category::where('slug', 'hair-care')->first();
        $popularHairCareProducts = $hair_care ? $hair_care->products()->orderBy('rating', 'desc')->limit(16)->get() : [];
        $latestHairCareProducts = $hair_care ? $hair_care->products()->latest()->limit(16)->get() : [];

        $fragrances = Category::where('slug', 'fragrances')->first();
        $popularFragrancesProducts = $fragrances ? $fragrances->products()->orderBy('rating', 'desc')->limit(16)->get() : [];
        $latestFragrancesProducts = $fragrances ? $fragrances->products()->latest()->limit(16)->get() : [];

        $home_decor = Category::where('slug', 'home-decor')->first();
        $homeDecorProducts = $home_decor ? $home_decor->products()->limit(16)->get() : [];
        $latestHomeDecorProducts = $home_decor ? $home_decor->products()->latest()->limit(16)->get() : [];

        $user = auth()->user();
        $wishlist = $user ? $user->wishlist()->pluck('product_id')->toArray() : [];
        // dd($wishlist);

        // dd($latestSkinProducts, $latestFragrancesProducts, $latestHomeDecorProducts);

        return view('frontend.index', compact(
            'leftSliders',
            'middleSlider',
            'rightSliders',
            'featured_products',
            'best_seller_products',
            'popularSkinProducts',
            'latestSkinProducts',
            'popularPersonalCareProducts',
            'latestPersonalCareProducts',
            'popularHairCareProducts',
            'latestHairCareProducts',
            'popularFragrancesProducts',
            'latestFragrancesProducts',
            'homeDecorProducts',
            'latestHomeDecorProducts',
            'wishlist'
        ));
    }
}
