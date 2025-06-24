<?php

use Illuminate\Support\Facades\Route;


Route::domain(config('app.cms_domain'))->group(function () {


    require __DIR__ . '/auth.php';

    Route::get("/login", 'App\Http\Controllers\cms\LoginController@loginShow')->name('cms.login');
    Route::post("/login", 'App\Http\Controllers\cms\LoginController@login')->name('cms.login.submit');

    Route::get('/forgot-password', 'App\Http\Controllers\cms\ForgotPasswordController@index')->name('cms.forgotPassword.index');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/change-password', 'App\Http\Controllers\cms\ChangePasswordController@changePassword')->name('cms.changePassword.index');
        Route::post('/change-password/{id}', 'App\Http\Controllers\cms\ChangePasswordController@passwordChange')->name('cms.password.submit');

        Route::get('/logout', 'App\Http\Controllers\cms\LoginController@logout')->name("cms.logout");

        Route::get('/', 'App\Http\Controllers\cms\StatisticsController@index')->name("cms.statistics.index");

        Route::get('categories/', 'App\Http\Controllers\cms\CategoryController@index')->name('backend.category.index');
        // Route::get('/category/show/{id}', 'App\Http\Controllers\cms\CategoryController@show')->name("backend.category.show");
        Route::get('category/create', 'App\Http\Controllers\cms\CategoryController@create')->name('backend.category.create');
        Route::post('category/store', 'App\Http\Controllers\cms\CategoryController@store')->name('backend.category.store');
        Route::get('category/edit/{id}', 'App\Http\Controllers\cms\CategoryController@edit')->name('backend.category.edit');
        Route::post('category/update/{id}', 'App\Http\Controllers\cms\CategoryController@update')->name('backend.category.update');
        Route::get('category/delete/{id}', 'App\Http\Controllers\cms\CategoryController@destroy')->name('backend.category.destroy');

        Route::get('brands/', 'App\Http\Controllers\cms\BrandController@index')->name('backend.brand.index');
        // Route::get('/brand/show/{id}', 'App\Http\Controllers\cms\BrandController@show')->name("backend.brand.show");
        Route::get('brand/create', 'App\Http\Controllers\cms\BrandController@create')->name('backend.brand.create');
        Route::post('brand/store', 'App\Http\Controllers\cms\BrandController@store')->name('backend.brand.store');
        Route::get('brand/edit/{id}', 'App\Http\Controllers\cms\BrandController@edit')->name('backend.brand.edit');
        Route::post('brand/update/{id}', 'App\Http\Controllers\cms\BrandController@update')->name('backend.brand.update');
        Route::get('brand/delete/{id}', 'App\Http\Controllers\cms\BrandController@destroy')->name('backend.brand.destroy');

        Route::get('sub_categories/', 'App\Http\Controllers\cms\SubCategoryController@index')->name('backend.sub_category.index');
        Route::get('/sub_category/show/{id}', 'App\Http\Controllers\cms\SubCategoryController@show')->name("backend.sub_category.show");
        Route::get('sub_category/create', 'App\Http\Controllers\cms\SubCategoryController@create')->name('backend.sub_category.create');
        Route::post('sub_category/store', 'App\Http\Controllers\cms\SubCategoryController@store')->name('backend.sub_category.store');
        Route::get('sub_category/edit/{id}', 'App\Http\Controllers\cms\SubCategoryController@edit')->name('backend.sub_category.edit');
        Route::post('sub_category/update/{id}', 'App\Http\Controllers\cms\SubCategoryController@update')->name('backend.sub_category.update');
        Route::get('sub_category/delete/{id}', 'App\Http\Controllers\cms\SubCategoryController@destroy')->name('backend.sub_category.destroy');

        Route::get('attributes/', 'App\Http\Controllers\cms\AttributeController@index')->name('backend.attribute.index');
        Route::get('/attribute/show/{id}', 'App\Http\Controllers\cms\AttributeController@show')->name("backend.attribute.show");
        Route::get('attribute/create', 'App\Http\Controllers\cms\AttributeController@create')->name('backend.attribute.create');
        Route::post('attribute/store', 'App\Http\Controllers\cms\AttributeController@store')->name('backend.attribute.store');
        Route::get('attribute/edit/{id}', 'App\Http\Controllers\cms\AttributeController@edit')->name('backend.attribute.edit');
        Route::post('attribute/update/{id}', 'App\Http\Controllers\cms\AttributeController@update')->name('backend.attribute.update');
        Route::get('attribute/delete/{id}', 'App\Http\Controllers\cms\AttributeController@destroy')->name('backend.attribute.destroy');

        Route::get('product_attribute_values/', 'App\Http\Controllers\cms\ProductAttributeController@index')->name('backend.product_attribute_value.index');
        // Route::get('/product_attribute_value/show/{id}', 'App\Http\Controllers\cms\ProductAttributeController@show')->name("backend.product_attribute_value.show");
        Route::get('product_attribute_value/create', 'App\Http\Controllers\cms\ProductAttributeController@create')->name('backend.product_attribute_value.create');
        Route::post('product_attribute_value/store', 'App\Http\Controllers\cms\ProductAttributeController@store')->name('backend.product_attribute_value.store');
        Route::get('product_attribute_value/edit/{id}', 'App\Http\Controllers\cms\ProductAttributeController@edit')->name('backend.product_attribute_value.edit');
        Route::post('product_attribute_value/update/{id}', 'App\Http\Controllers\cms\ProductAttributeController@update')->name('backend.product_attribute_value.update');
        Route::get('product_attribute_value/delete/{id}', 'App\Http\Controllers\cms\ProductAttributeController@destroy')->name('backend.product_attribute_value.destroy');

        Route::get('coupons/', 'App\Http\Controllers\cms\CouponController@index')->name('backend.coupon.index');
        Route::get('/coupon/show/{id}', 'App\Http\Controllers\cms\CouponController@show')->name("backend.coupon.show");
        Route::get('coupon/create', 'App\Http\Controllers\cms\CouponController@create')->name('backend.coupon.create');
        Route::post('coupon/store', 'App\Http\Controllers\cms\CouponController@store')->name('backend.coupon.store');
        Route::get('coupon/edit/{id}', 'App\Http\Controllers\cms\CouponController@edit')->name('backend.coupon.edit');
        Route::post('coupon/update/{id}', 'App\Http\Controllers\cms\CouponController@update')->name('backend.coupon.update');
        Route::get('coupon/delete/{id}', 'App\Http\Controllers\cms\CouponController@destroy')->name('backend.coupon.destroy');
        Route::get('coupon/usages/{id}', 'App\Http\Controllers\cms\CouponController@couponUsageIndex')->name('backend.couponUsages.index');

        Route::get('users/', 'App\Http\Controllers\cms\UserController@index')->name('backend.user.index');
        Route::get('/user/show/{id}', 'App\Http\Controllers\cms\UserController@show')->name("backend.user.show");

        Route::get('products/', 'App\Http\Controllers\cms\ProductController@index')->name('backend.product.index');
        Route::get('/product/show/{id}', 'App\Http\Controllers\cms\ProductController@show')->name("backend.product.show");
        Route::get('product/create', 'App\Http\Controllers\cms\ProductController@create')->name('backend.product.create');
        Route::post('product/store', 'App\Http\Controllers\cms\ProductController@store')->name('backend.product.store');
        Route::get('product/edit/{id}', 'App\Http\Controllers\cms\ProductController@edit')->name('backend.product.edit');
        Route::post('product/update/{id}', 'App\Http\Controllers\cms\ProductController@update')->name('backend.product.update');
        Route::get('product/delete/{id}', 'App\Http\Controllers\cms\ProductController@destroy')->name('backend.product.destroy');

        Route::get('product/review/{id}', 'App\Http\Controllers\cms\ReviewController@index')->name('backend.product.review');
        Route::get('product/review/show/{product_id}/{review_id}', 'App\Http\Controllers\cms\ReviewController@show')->name('backend.product.review.show');
        Route::get('product/review/edit/{product_id}/{review_id}', 'App\Http\Controllers\cms\ReviewController@edit')->name('backend.product.review.edit');
        Route::post('product/review/update/{product_id}/{review_id}', 'App\Http\Controllers\cms\ReviewController@update')->name('backend.product.review.update');
        Route::get('product/review/delete/{product_id}/{review_id}', 'App\Http\Controllers\cms\ReviewController@destroy')->name('backend.product.review.delete');

        Route::get('showcases', 'App\Http\Controllers\cms\ShowcaseController@index')->name('backend.showcase.index');
        Route::get('/showcase/show/{id}', 'App\Http\Controllers\cms\ShowcaseController@show')->name("backend.showcase.show");
        Route::get('showcase/create', 'App\Http\Controllers\cms\ShowcaseController@create')->name('backend.showcase.create');
        Route::post('showcase/store', 'App\Http\Controllers\cms\ShowcaseController@store')->name('backend.showcase.store');
        Route::get('showcase/edit/{id}', 'App\Http\Controllers\cms\ShowcaseController@edit')->name('backend.showcase.edit');
        Route::post('showcase/update/{id}', 'App\Http\Controllers\cms\ShowcaseController@update')->name('backend.showcase.update');
        Route::get('showcase/delete/{id}', 'App\Http\Controllers\cms\ShowcaseController@destroy')->name('backend.showcase.destroy');
        Route::get('showcase_product/delete/{id}', 'App\Http\Controllers\cms\ShowcaseController@destroyShowcaseProduct')->name('backend.showcaseproduct.destroy');

        Route::get('orders', 'App\Http\Controllers\cms\OrderController@index')->name('backend.order.index');
        Route::get('/order/show/{id}', 'App\Http\Controllers\cms\OrderController@show')->name("backend.order.show");
        Route::get('/order/items/{id}', 'App\Http\Controllers\cms\OrderController@orderItems')->name("backend.order.items");
        // Route::get('/order/edit/{id}', 'App\Http\Controllers\cms\OrderController@edit')->name("backend.order.edit");
        // Route::post('/order/update/{id}', 'App\Http\Controllers\cms\OrderController@update')->name("backend.order.update");

        Route::get('/order/delivery/create/{id}', 'App\Http\Controllers\cms\DeliveryController@create')->name("backend.order.delivery.create");
        Route::post('/order/delivery/store/{id}', 'App\Http\Controllers\cms\DeliveryController@store')->name("backend.order.delivery.store");

        Route::get('deliveries', 'App\Http\Controllers\cms\DeliveryController@index')->name('backend.delivery.index');
        Route::get('/delivery/show/{id}', 'App\Http\Controllers\cms\DeliveryController@show')->name("backend.delivery.show");

        Route::get('/delivery/edit/{id}', 'App\Http\Controllers\cms\DeliveryController@edit')->name("backend.delivery.edit");
        Route::post('/delivery/update/{id}', 'App\Http\Controllers\cms\DeliveryController@update')->name("backend.delivery.update");

        // Route::get('/delivery/print/generate_awb/{id}', 'App\Http\Controllers\cms\DeliveryController@generateAwb')->name("backend.delivery.generate_awb");

        Route::get('/delivery/fetch/{id}', 'App\Http\Controllers\cms\DeliveryController@fetchDelivery')->name("backend.delivery.fetch");

        Route::get('/delivery/print/manifest/{id}', 'App\Http\Controllers\cms\DeliveryController@printManifest')->name("backend.delivery.manifest");
        Route::get('/delivery/print/label/{id}', 'App\Http\Controllers\cms\DeliveryController@printLabel')->name("backend.delivery.label");

        Route::get('transactions/', 'App\Http\Controllers\cms\TransactionController@index')->name('backend.transaction.index');
        Route::get('/transaction/show/{id}', 'App\Http\Controllers\cms\TransactionController@show')->name("backend.transaction.show");

        Route::get('/category/get/subcategory/{id}', 'App\Http\Controllers\cms\ProductController@getSubCategory')->name("cms.subcategory.get");

        Route::get('sliders', 'App\Http\Controllers\cms\SliderController@index')->name('backend.slider.index');
        Route::get('/slider/show/{id}', 'App\Http\Controllers\cms\SliderController@show')->name("backend.slider.show");
        // Route::get('slider/create', 'App\Http\Controllers\cms\SliderController@create')->name('backend.slider.create');
        // Route::post('slider/store', 'App\Http\Controllers\cms\SliderController@store')->name('backend.slider.store');
        Route::get('slider/edit/{id}', 'App\Http\Controllers\cms\SliderController@edit')->name('backend.slider.edit');
        Route::post('slider/update/{id}', 'App\Http\Controllers\cms\SliderController@update')->name('backend.slider.update');
        // Route::get('slider/delete/{id}', 'App\Http\Controllers\cms\SliderController@destroy')->name('backend.slider.destroy');
    });
});
