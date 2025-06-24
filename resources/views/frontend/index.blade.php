@extends('frontend.layouts.app')
@section('title')
@section('content')
    {{-- first slider slider --}}
    <section>
        <div class="container">
            <h2 class="text-red main-head text-capitalize mt-0 mt-lg-4 mb-3 mb-sm-4">#Bestseller of channel</h2>
            <div class="d-none d-md-block">
                <div class="row main-group-card-hero-slider">
                    <div class="product-slide-1 ele-scale-1">
                        @if ($leftSliders)
                            <div class="hero-main-slider" style="">
                                <img src="{{ asset('storage/images/sliders/' . $leftSliders->image) }}" class="img-fluid"
                                    alt="..." style="border-radius: 30px 30px 0px 0px">
                                <div class="slider-card-first">
                                    <div class="text-center bg-skin-color second-group-card-body">
                                        <h2 class="text-center font-head">{{ $leftSliders->title }}</h2>
                                        <p class="group-card-text-color">
                                            {{ $leftSliders->descriptions }}
                                        </p>
                                        <button type="button" class="text-center group-buutton-bg-disable">
                                            <a class="d-flex gap-2" href="{{ $leftSliders->link }}">
                                                <span class="group-card-shop-btn">Shop Now</span>
                                                <i class="fa fa-angle-right group-button-arrow"></i>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="product-slide-2 ele-scale-1">
                        @if ($middleSlider)
                            <div class="hero-main-slider">
                                <img src="{{ asset('frontend/images/sliders/new-xi.png') }}"
                                    class="img-fluid second-group-img" alt="...">
                                <div class="slider-card-second">
                                    {{-- <img src="{{ asset('storage/images/sliders/' . $middleSlider->image) }}"
                                        class="img-fluid second-group-img" alt="..."> --}}

                                    <div
                                        class=" text-center  second-group-card-body d-flex flex-column justify-content-center align-items-center gap-2">
                                        <h3 class="card-title text-center font-head ">{{ $middleSlider->title }}</h3>
                                        <p class="card-text group-card-text-color mt-0 mb-0" style="font-size:14px">
                                            {{ $middleSlider->descriptions }}
                                        </p>

                                        <button type="button" class="text-center group-buutton-bg-disable">
                                            <a class=" d-flex gap-2" href="{{ $middleSlider->link }}">
                                                <span class="group-card-shop-btn ">Shop Now</span>
                                                <i class="fa fa-angle-right group-button-arrow"></i>
                                            </a>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>

                    <div class="product-slide-3">
                        @if ($rightSliders->count())
                            <div class="row">
                                @forelse ($rightSliders as $rigslider)
                                    <div class="col-lg-12 col-md-6 group-card-3 mb-md-0 mb-lg-4">

                                        <div class="card fourth-group-card ele-scale-1">
                                            <img src="{{ asset('storage/images/sliders/' . $rigslider->image) }}"
                                                class="card-img-top fourth-group-img" alt="..."
                                                style="border-radius: 26.6782px 26.6782px 0px 0px;">
                                            <div class="card-body text-center fourth-group-card-body">
                                                <h4 class="card-title text-center font-head m-0">{{ $rigslider->title }}
                                                </h4>
                                                <p class="card-text group-card-text-color m-0">
                                                    {{ $rigslider->descriptions }}
                                                </p>
                                                <a class=" d-flex  justify-content-center gap-2 text-center group-buutton-bg-disable"
                                                    href="{{ $rigslider->link }}">
                                                    <span class="group-card-shop-btn ">Shop Now</span>
                                                    <i class="fa fa-angle-right group-button-arrow"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                @empty
                                @endforelse
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <div class="d-block d-md-none">

                <div class="slider-container" style="isolation:isolate">

                    <div class="hero-top-slider" style="--card-theme-color:#ebb579">
                        @if ($leftSliders)
                            <div class="slide mobile-hero-slide">
                                <img src="{{ asset('storage/images/sliders/' . $leftSliders->image) }}" alt="">
                                <div class="content">
                                    <h4>
                                        {{ $leftSliders->title }}
                                    </h4>
                                    <p class="text-center">
                                        {{ $leftSliders->descriptions }}
                                    </p>
                                    <a class="d-flex gap-2 justify-content-center " href="{{ $leftSliders->link }}">
                                        <span class="group-card-shop-btn ">Shop Now</span>
                                        <i class="fa fa-angle-right group-button-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if ($middleSlider)
                            <div class="slide mobile-hero-slide" style="--card-theme-color:#fb8ca5">
                                <img src="{{ asset('storage/images/sliders/' . $middleSlider->image) }}" alt="">
                                <div class="content">
                                    <h4>
                                        <p class="text-center">
                                            {{ $middleSlider->title }}
                                        </p>
                                    </h4>
                                    {{ $middleSlider->descriptions }}
                                    <a class="d-flex gap-2 justify-content-center " href="{{ $middleSlider->link }}">
                                        <span class="group-card-shop-btn ">Shop Now</span>
                                        <i class="fa fa-angle-right group-button-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if ($rightSliders->count())
                            <div class="d-flex flex-column justify-content-center" style="gap:0.8rem">
                                @forelse ($rightSliders as $rightSlider)
                                    <div class="slide mobile-hero-slide half">
                                        <img src="{{ asset('storage/images/sliders/' . $rightSlider->image) }}"
                                            alt="">
                                        <div class="content">
                                            <h4 class="mb-1">
                                                {{ $rightSlider->title }}
                                            </h4>
                                            <p class="text-center mb-1">
                                                {{ $rightSlider->descriptions }}
                                            </p>
                                            <a class="d-flex gap-2 justify-content-center "
                                                href="{{ $rightSlider->link }}">
                                                <span class="group-card-shop-btn ">Shop Now</span>
                                                <i class="fa fa-angle-right group-button-arrow"></i>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Features Products --}}
    @if ($featured_products)
        <section class="mt-0 mt-sm-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="mt-producttabs style2" data-aos="fade-up">
                            <!-- producttabs start here -->
                            <ul class="producttabs">
                                <li> Channel</li>
                                <li><a href="#featured" class="text-capitalize active">Featured</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="featured">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($featured_products as $p)
                                            <!-- slide start here -->
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description" class="img-fluid">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}
                                                                        </h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Best Seller Products --}}
    @if ($best_seller_products)
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="mt-producttabs style2" data-aos="fade-up">
                            <!-- producttabs start here -->
                            <ul class="producttabs">
                                <li> Channel</li>
                                <li><a href="#best_seller" class="text-capitalize active">Best Seller</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="best_seller">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances ">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($best_seller_products as $p)
                                            <!-- slide start here -->
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}
                                                                        </h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Skin Care Slider --}}
    @if ($latestSkinProducts->count() || $popularSkinProducts->count())
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="mt-producttabs style2 " data-aos="fade-up">
                            <!-- producttabs start here -->
                            <ul class="producttabs">
                                <li> Skin Care</li>
                                <li><a href="#skinlatest" class="text-capitalize active">Latest</a></li>
                                <li><a href="#skinpopular" class="text-capitalize">Popular</a></li>
                            </ul>

                            <div class="tab-content">

                                <div id="skinlatest">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances ">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($latestSkinProducts as $p)
                                            <!-- slide start here -->
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}</h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>

                                <div id="skinpopular">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($popularSkinProducts as $p)
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}</h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Personal Care Slider --}}
    @if ($latestPersonalCareProducts->count() || $popularPersonalCareProducts->count())
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="mt-producttabs style2 " data-aos="fade-up">
                            <!-- producttabs start here -->
                            <ul class="producttabs">
                                <li> Personal Care</li>
                                <li><a href="#personal_care_latest" class="text-capitalize active">Latest</a></li>
                                <li><a href="#personal_care_popular" class="text-capitalize">Popular</a></li>
                            </ul>

                            <div class="tab-content">

                                <div id="personal_care_latest">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances ">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($latestPersonalCareProducts as $p)
                                            <!-- slide start here -->
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}</h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>

                                <div id="personal_care_popular">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($popularPersonalCareProducts as $p)
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}</h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Hair Care Slider --}}
    @if ($latestHairCareProducts->count() || $popularHairCareProducts->count())
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="mt-producttabs style2 " data-aos="fade-up">
                            <!-- producttabs start here -->
                            <ul class="producttabs">
                                <li> Hair Care</li>
                                <li><a href="#hair_care_latest" class="text-capitalize active">Latest</a></li>
                                <li><a href="#hair_care_popular" class="text-capitalize">Popular</a></li>
                            </ul>

                            <div class="tab-content">

                                <div id="hair_care_latest">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances ">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($latestHairCareProducts as $p)
                                            <!-- slide start here -->
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}</h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>

                                <div id="hair_care_popular">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($popularHairCareProducts as $p)
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}</h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Fragrances Slider --}}
    @if ($latestFragrancesProducts->count() || $popularFragrancesProducts->count())
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="mt-producttabs style2 " data-aos="fade-up">
                            <!-- producttabs start here -->
                            <ul class="producttabs">
                                <li> Fragrances</li>
                                <li><a href="#fragranceslatest" class="text-capitalize active">Latest</a></li>
                                <li><a href="#fragrancespopular" class="text-capitalize">Popular</a></li>
                            </ul>

                            <div class="tab-content">

                                <div id="fragranceslatest">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances ">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($latestFragrancesProducts as $p)
                                            <!-- slide start here -->
                                            <div class="slide  skin-slide isolation position-relative">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="position-relative fragrances-img-bottom">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="product-text-size">
                                                                            {{ str_limit($p->name, 50) }}</h4>
                                                                    </div>
                                                                    <span class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </span>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn shop-cutome-newbtn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black shop-cutome-btn">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>

                                <div id="fragrancespopular">
                                    <!-- tabs slider start here -->
                                    <div class="fragrances">
                                        {{-- @for ($i = 1; $i < 6; $i++) --}}
                                        @foreach ($popularFragrancesProducts as $p)
                                            <div class="slide  skin-slide">
                                                <div class="mt-product1 large mt-skin-product1 w-100">
                                                    <div class="box skin-box w-100" style="max-width: 300px;">
                                                        <div class="b1">
                                                            <div class="b2">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}">
                                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                                                        alt="image description">
                                                                </a>

                                                                @if (in_array($p->id, $wishlist))
                                                                    <button class="btn like-btn-skin add-to-wish active"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button class="btn like-btn-skin add-to-wish"
                                                                        data-p-id="{{ $p->id }}">
                                                                        <span class="has-tool-tip">
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head"
                                                                        title="{{ $p->name }}">
                                                                        <h4 class="">{{ str_limit($p->name, 50) }}
                                                                        </h4>
                                                                    </div>
                                                                    <p class="card-text text-center">
                                                                        {{ $p->short_decriptions }}
                                                                    </p>


                                                                    <button type="button"
                                                                        class="btn btn-light sk-btn shop-now-btn"
                                                                        title="{{ $p->name }}">
                                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                            class="p-0  text-black">
                                                                            Shop Now
                                                                        </a>
                                                                    </button>
                                                                </ul>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- mt product1 center end here -->
                                            </div>
                                        @endforeach
                                        {{-- @endfor --}}
                                    </div>
                                    <!-- tabs slider end here -->
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif



    {{-- @if ($latestHomeDecorProducts->count())
        <section>
            <div class="container">
                <h2 class="text-orange text-center text-capitalize">
                    Transform your living space into a cozy
                    <br> sanctuary with unique <span class="text-pink"> home decor</span> accents
                </h2>

                <div class="rise-up-slider">

                    @foreach ($latestHomeDecorProducts as $p)
                        <div class="rise-up-slider-card">
                            <img class="product" src="{{ asset('storage/images/products/thumbnails/' . $p->thumbnail_image) }}"
                                alt="" class="img-fluid w-100">
                            <div class="text">
                                <div>
                                    <h4 class="text-capitalize" title="{{ $p->name }}">
                                        {{ str_limit($p->name, 50) }}
                                    </h4>
                                    ₹{{ $p->final_price }} <s class="text-muted">₹{{ $p->mrp }}</s>
                                </div>
                                <div>
                                    @if (in_array($p->id, $wishlist))
                                        <button class="like-btn btn btn wishlist add-to-wish active"
                                            data-p-id="{{ $p->id }}">
                                            <span class="has-tool-tip">
                                                <i class="fa-regular fa-heart"></i>
                                            </span>
                                        </button>
                                    @else
                                        <button class="like-btn btn btn wishlist add-to-wish"
                                            data-p-id="{{ $p->id }}">
                                            <span class="has-tool-tip">
                                                <i class="fa-regular fa-heart"></i>
                                            </span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif --}}


    {{-- organic-product slider --}}

    <section class="og-main-section">
        <div class="container og-main">
            <div class="sib-card row">
                <div class="og-main-part-1 col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <h4 class="text-red  text-capitalize main-head mb-4" style="font-weight:500;">
                        #look for home decor too..
                    </h4>

                    <img src="frontend/images/organic-product/dm-1.png" alt=""
                        class="og-main-img-first img-fluid" style="z-index: 1">


                    <div class="organic-product-slider og-main-card ">
                        <div class="text og-main-text">
                            <div class="og-main-sy position-relative" style="z-index: 10">
                                <h3 class="pro-head">
                                    Add Flair To Your Home With <br /> Statement Home Décor
                                </h3>


                                <p style="color:rgba(0, 0, 0, 0.6 )" class="text-capitalize pt-2 pb-2">
                                    Here are our home decor categories <br /> that will transform your home
                                </p>

                            </div>
                            <div class="og-main-button">
                                <button type="button" class="oganic-button">
                                    <a href="{{ route('frontend.cat.show', 'home-decor') }}">
                                        Shop Now
                                    </a>
                                </button>
                            </div>

                        </div>

                    </div>
                </div>


                <div class=" og-main-part-1 col-lg-6" data-aos="fade-left">
                    <h4 class="text-red text-capitalize main-head mb-4" style="font-weight:500;">
                        #best Gift for your loved ones
                    </h4>

                    <img src="frontend/images/organic-product/dm-2.png" alt=""
                        class="og-main-img-newfirst img-fluid">

                    <div class="organic-product-slider og-main-card ">
                        <div class="text og-main-text">
                            <div class="og-main-sy position-relative" style="z-index: 10">
                                <h3 class="pro-head">
                                    A Little Something To <br /> Make Someone Smile
                                </h3>

                                <p style="color:rgba(0, 0, 0, 0.6 )" class="text-capitalize pt-4 pb-3 pt-xl-2 pb-xl-2">
                                    Making Moments Magical Gift for <br /> your loved ones

                                </p>

                            </div>
                            <div class="og-main-button">
                                <button type="button" class="oganic-button">
                                    <a href="{{ route('frontend.cat.show', 'gift') }}">
                                        Shop Now
                                    </a>
                                </button>
                            </div>

                        </div>

                    </div>
                </div>



            </div>

        </div>
    </section>


    <!-- F Promo Box of the Page -->
    <section class="pb-0 mb-0 service-box-bg">
        <aside class="f-promo-box dark  f-promo-box-newp">
            <div class="container divider">
                <div class="row row-cols-2 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 ">
                    <div class="col mt-paddingbottomsm ft-svg-class-1">
                        <!-- F Widget Item of the Page -->
                        <div class="f-widget-item ft-svg-sub-class-1">
                            <span class="widget-icon ft-svg-child-1">
                                <img src="{{ asset('frontend/images/products/footer-icon/free-shipping.svg') }}"
                                    alt="">

                            </span>
                            <div class="txt-holder  ft-svg-child-2 main-head">
                                <h1 class="f-promo-box-heading ">FREE SHIPPING</h1>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                        <!-- F Widget Item of the Page end -->
                    </div>
                    <div class="col mt-paddingbottomsm ft-svg-class-2">
                        <!-- F Widget Item of the Page -->
                        <div class="f-widget-item ft-svg-sub-class-2">
                            <span class="widget-icon ft-svg-child-1">
                                <img src="{{ asset('frontend/images/products/footer-icon/support.svg') }}"
                                    alt="">
                            </span>
                            <div class="txt-holder ft-svg-child-2 main-head">
                                <h1 class="f-promo-box-heading">SUPPORT 24/7</h1>
                                <p>We support 24 hours a day</p>
                            </div>
                        </div>
                        <!-- F Widget Item of the Page -->
                    </div>
                    <div class="col mt-paddingbottomxs ft-svg-class-3">
                        <!-- F Widget Item of the Page -->
                        <div class="f-widget-item ft-svg-sub-class-3">
                            <span class="widget-icon ft-svg-child-1">
                                <img src="{{ asset('frontend/images/products/footer-icon/gift-card.svg') }}"
                                    alt="">
                            </span>
                            <div class="txt-holder ft-svg-child-2 main-head">
                                <h1 class="f-promo-box-heading">GIFT CARDS</h1>
                                <p>Give perfect gift</p>
                            </div>
                        </div>
                        <!-- F Widget Item of the Page -->
                    </div>
                    <div class="col ft-svg-class-4-new">
                        <!-- F Widget Item of the Page -->
                        <div class="f-widget-item ft-svg-class-4">
                            <span class="widget-icon ft-svg-child-1">
                                <img src="{{ asset('frontend/images/products/footer-icon/payment.svg') }}"
                                    alt="">
                            </span>
                            <div class="txt-holder ft-svg-child-2">
                                <h1 class="h2 f-promo-box-heading">PAYMENT 100% SECURE</h1>
                                <p>Payment 100% secure</p>
                            </div>
                        </div>
                        <!-- F Widget Item of the Page -->
                    </div>
                </div>
            </div>
        </aside>
    </section>
@endsection
