<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(config('app.web_domain'))->group(function () {

    // Route::get('/', function () {
    //     return view('frontend.index');
    // })->name('index');
    Route::get('/', 'App\Http\Controllers\frontend\HomeController@index')->name('frontend.index');
    // Route::get('/checkout', function () {
    //     return view('frontend.checkout');
    // })->name('checkout');


    Route::post('send-otp', 'App\Http\Controllers\frontend\LoginController@sendOtp')->name('frontend.send-otp');
    Route::post('verify-otp', 'App\Http\Controllers\frontend\LoginController@verifyOtp')->name('frontend.verify-otp');

    Route::group(['middleware' => 'auth:web'], function () {

        // Route::get('/profile', function () {
        //     return view('frontend.profile');
        // })->name('frontend.profile');
        Route::get('/profile', 'App\Http\Controllers\frontend\ProfileController@index')->name('frontend.profile');
        Route::post('/profile/update', 'App\Http\Controllers\frontend\ProfileController@update')->name('frontend.profile.update');
        Route::post('/address/update', 'App\Http\Controllers\frontend\AddressController@update')->name('frontend.address.update');
        Route::get('/address/delete/{id}', 'App\Http\Controllers\frontend\AddressController@destroy')->name('frontend.address.delete');

        Route::get('/wishlist', 'App\Http\Controllers\frontend\WishlistController@index')->name('frontend.wishlist.index');

        Route::post('/review/store/{product_slug}', 'App\Http\Controllers\frontend\ProductController@storeReview')->name('frontend.review.store');

        Route::post('/logout', 'App\Http\Controllers\frontend\LoginController@logout')->name('frontend.logout');
    });

    // Route::get('/order', function () {
    //     return view('frontend.order');
    // })->name('order');

    Route::get('/not-yet-shipped', function () {
        return view('frontend.not-yet-shipped');
    })->name('not-yet-shipped');

    Route::get('/buy-again', function () {
        return view('frontend.buy-again');
    })->name('buy-again');

    Route::get('/cancelled-orders', function () {
        return view('frontend.cancelled-orders');
    })->name('cancelled-orders');

    Route::get('/return-order-first', function () {
        return view('frontend.return-order-first');
    })->name('return-order-first');

    Route::get('/return-order-second', function () {
        return view('frontend.return-order-second');
    })->name('return-order-second');

    Route::get('/cancel-order-first', function () {
        return view('frontend.cancel-order-first');
    })->name('cancel-order-first');

    Route::get('/cancel-order-second', function () {
        return view('frontend.cancel-order-second');
    })->name('cancel-order-second');

    Route::get('/order-tracking-first', function () {
        return view('frontend.order-tracking-first');
    })->name('order-tracking-first');

    Route::get('/order-details', function () {
        return view('frontend.order-details');
    })->name('order-details');

    Route::get('/write-review', function () {
        return view('frontend.write-review');
    })->name('write-review');


    Route::get('/review-index', function () {
        return view('frontend.review-index');
    })->name('review-index');

    Route::get('/review-show', function () {
        return view('frontend.review-show');
    })->name('review-show');


    Route::get('/gift-card', function () {
        return view('frontend.gift-card');
    })->name('gift-card');

    Route::get('/gift-card-index', function () {
        return view('frontend.gift-card-index');
    })->name('gift-card-index');

    Route::get('/profile-payment-method', function () {
        return view('frontend.inside-profile-payment-method');
    })->name('profile-payment-method');

    // Route::get('/cart', function () {
    //     return view('frontend.cart');
    // })->name('cart');

    Route::get('/gift-card-review', function () {
        return view('frontend.gift-card-review');
    })->name('gift-card-review');



    /*Route::get('/contact-us', function () {
        return view('frontend/layouts/contact-us');
    })->name('contact');*/

    // Product page
    Route::get('/skin', function () {
        return view('frontend.product.skin-care.index');
    })->name('skin');

    Route::get('/fragrances', function () {
        return view('frontend.product.fragrances.index');
    })->name('fragrances');

    // end product page
    Route::get('/products', function () {
        return view('frontend/product/index');
    })->name('products');

    Route::get('/terms-and-conditions', function () {
        return view('frontend.terms-and-conditions');
    })->name('frontend.terms-and-conditions');

    Route::get('/shipping-policy', function () {
        return view('frontend.shipping-policy');
    })->name('frontend.shipping-policy');

    Route::get('/returns-and-refunds-policy', function () {
        return view('frontend.returns-and-refunds-policy');
    })->name('frontend.returns-and-refunds-policy');

    Route::get('/privacy-policy', function () {
        return view('frontend.privacy-policy');
    })->name('frontend.privacy-policy');

    Route::get('/about-us', function () {
        return view('frontend.about');
    })->name('frontend.about');
    Route::get('/contact-us', function () {
        return view('frontend.contact-us');
    })->name('frontend.contact-us');

    Route::get('/payment', function () {
        return view('frontend.payment');
    })->name('frontend.payment');
    Route::get('/payment-process', function () {
        return view('frontend.payment-process');
    })->name('frontend.payment-process');

    Route::get('/payment-success', function () {
        return view('frontend.payment-success');
    })->name('frontend.payment-success');

    Route::get('/payment-failed', function () {
        return view('frontend.payment-failed');
    })->name('frontend.payment-failed');
    // Route::get('/products/{slug}', function () {
    //     return view('frontend/product/show');
    // })->name('products.show');

    Route::get('/c/{slug}', 'App\Http\Controllers\frontend\CategoryController@show')->name('frontend.cat.show');
    Route::get('/sc/{categorySlug}/{subCategorySlug}', 'App\Http\Controllers\frontend\SubCategoryController@show')->name('frontend.sub-category.index');
    Route::get('/p/{slug}', 'App\Http\Controllers\frontend\ProductController@show')->name('frontend.p.show');
    Route::post('/p/review/{product_slug}', 'App\Http\Controllers\frontend\ReviewController@store')->name('frontend.p.store');

    Route::get('/checkout/p/{product_slug}', 'App\Http\Controllers\frontend\ProductController@checkout')->name('frontend.p.checkout');

    Route::post('/p/addToCart', 'App\Http\Controllers\frontend\CartController@addToCart')->name('frontend.p.addToCart');
    Route::post('/p/addToWishlist', 'App\Http\Controllers\frontend\WishlistController@addToWishlist')->name('frontend.p.addToWishlist');


    Route::group(['middleware' => 'auth:web'], function () {

        // Route::get('/profile', function () {
        //     return view('frontend.profile');
        // })->name('frontend.profile');
        Route::get('/profile', 'App\Http\Controllers\frontend\ProfileController@index')->name('frontend.profile');
        Route::post('/profile/update', 'App\Http\Controllers\frontend\ProfileController@update')->name('frontend.profile.update');
        Route::post('/address/update', 'App\Http\Controllers\frontend\AddressController@update')->name('frontend.address.update');
        Route::get('/address/delete/{id}', 'App\Http\Controllers\frontend\AddressController@destroy')->name('frontend.address.delete');

        Route::get('/wishlist', 'App\Http\Controllers\frontend\WishlistController@index')->name('frontend.wishlist.index');
        Route::post('/review/store/{product_slug}', 'App\Http\Controllers\frontend\ReviewController@store')->name('frontend.review.store');

        Route::get('/cart/checkout', 'App\Http\Controllers\frontend\CheckoutController@selectAddress')->name('frontend.cart.checkout');
        Route::post('apply-coupon', 'App\Http\Controllers\frontend\CheckoutController@applyCoupon')->name('frontend.apply-coupon');
        Route::get('remove-coupon', 'App\Http\Controllers\frontend\CheckoutController@removeCoupon')->name('frontend.remove-coupon');
        Route::post('/cart/payment', 'App\Http\Controllers\frontend\CheckoutController@showPaymentPage')->name('frontend.cart.payment');

        Route::get('/orders', 'App\Http\Controllers\frontend\OrderController@index')->name('frontend.order.index');

        Route::post('/logout', 'App\Http\Controllers\frontend\LoginController@logout')->name('frontend.logout');
    });


    Route::get('/cart', 'App\Http\Controllers\frontend\CartController@index')->name('frontend.cart.index');

    Route::post('/api/cart/items/fetch', 'App\Http\Controllers\frontend\CartController@getCartItemsApi')->name('frontend.get.cart_items.api');
    Route::post('/api/cart/item/increase', 'App\Http\Controllers\frontend\CartController@increaseItemQuantity')->name('frontend.api.cart_items.increase_quantity');
    Route::post('/api/cart/item/decrease', 'App\Http\Controllers\frontend\CartController@decreaseItemQuantity')->name('frontend.api.cart_items.decrease_quantity');
    Route::post('/api/cart/item/remove', 'App\Http\Controllers\frontend\CartController@removeItem')->name('frontend.api.cart_item.remove');

    Route::get('/cart/delete/{id}', 'App\Http\Controllers\frontend\CartController@delete')->name('frontend.cart.delete');
    Route::get('/wishlist/delete/{id}', 'App\Http\Controllers\frontend\WishlistController@delete')->name('frontend.wishlist.delete');

    Route::get('/wishlist/delete/{id}', 'App\Http\Controllers\frontend\WishlistController@delete')->name('frontend.wishlist.delete');

    Route::post('callback', 'App\Http\Controllers\frontend\CheckoutController@handleCallback')->name('razorpay.callback');
    Route::post('webhook', 'App\Http\Controllers\frontend\WebhookController@manage')->name('webhook.manage');
});
