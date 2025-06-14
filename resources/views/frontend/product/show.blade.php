@extends('frontend.layouts.app')
@section('title', $product->name . ' |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <main id="mt-main">
        <!-- Mt Product detial of the Page -->
        <section class="mt-product-detial wow fadeInUp mt-4 " data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Slider of the Page -->
                        <div class="slider">
                            <div class="product-slider">
                                <div class="slide">
                                    <img src="{{ asset('storage/images/products/' . $product->thumbnail_image) }}"
                                        alt="image description">
                                </div>
                                {{-- <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div> --}}
                            </div>

                            <ul class="list-unstyled slick-slider pagg-slider">
                                <li>
                                    <div class="img">
                                        <img src="{{ asset('storage/images/products/' . $product->thumbnail_image) }}"
                                            alt="image description">
                                    </div>
                                </li>
                                {{-- <li>
                                    <div class="img">
                                        <img src="https://via.placeholder.com/600" alt="image description">
                                    </div>
                                </li>
                                <li>
                                    <div class="img">
                                        <img src="https://via.placeholder.com/600" alt="image description">
                                    </div>
                                </li>
                                <li>
                                    <div class="img">
                                        <img src="https://via.placeholder.com/600" alt="image description">
                                    </div>
                                </li>
                                <li>
                                    <div class="img">
                                        <img src="https://via.placeholder.com/600" alt="image description">
                                    </div>
                                </li> --}}

                            </ul>
                            <!-- Pagg Slider of the Page end -->
                        </div>
                        <!-- Slider of the Page end -->
                        <!-- detial Holder of the Page -->
                        <div class="detial-holder">
                            <h1 class="h3 font-body">
                                {{ $product->name }}
                            </h1>
                            <hr>
                            <p class="text-muted">
                                {{ $product->short_descriptions }}
                            </p>
                            <h3 class="h5 font-body">
                                From ₹{{ $product->final_price }} <s class="text-danger">₹{{ $product->mrp }}</s>
                            </h3>
                            @if ($product->stock)
                                <h4 class="font-body h5 text-green">
                                    <i class="fa-regular fa-circle-check"></i> In Stock
                                </h4>
                            @else
                                <h4 class="font-body h5 text-red">
                                    <i class="fa-regular fa-circle-xmark"></i> Out of Stock
                                </h4>
                            @endif
                            {{-- <label for="color-option">
                                    Select a color * :
                                </label> --}}
                            <div class="row">
                                {{-- <div class="col-12 col-md-6 mb-3">
                                        <select class="form-select" name="color-option" id="color-option" id="">
                                            <option value="choose an option" disabled selected> choose an option
                                            </option>
                                            <option>Red</option>
                                            <option>Green</option>
                                            <option>Blue</option>
                                        </select>
                                    </div> --}}
                                {{-- <div class="col-12 mb-3">
                                    @foreach ($attributes as $attribute)
                                        <label for="">{{ $attribute->name }}</label>
                                        @foreach ($similarProducts as $similarProduct)
                                            @php
                                                $similarProduct = $similarProduct
                                                    ->values()
                                                    ->where('product_attributes.attribute_id', $attribute->id)
                                                    ->first();
                                            @endphp
                                            @if ($similarProduct)
                                                <p>{{ $similarProduct->name }}
                                                </p>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div> --}}

                                <form action="{{ route('frontend.p.checkout', $product->slug) }}" method="GET">
                                    {{-- @csrf --}}
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="qty-counter">
                                            <label for="qty" class="px-md-2">
                                                Quantity
                                            </label>
                                            <div class="input-group flex-nowrap counter">
                                                <button type="button" class="input-group-text decrease-quantity">-</button>
                                                <input type="number" name="quantity" class="form-control quantity-input"
                                                    value="1">
                                                <button type="button" class="input-group-text increase-quantity">+</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-around flex-wrap my-3 ">
                                        @if ($product->isInCart())
                                            <a href="javascript:void(0)" class="btn btn-pink add-to-cart btn-outline-pink"
                                                data-p-id="{{ $product->id }}">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                    data-prefix="fas" data-icon="check" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                                    </path>
                                                </svg> Added
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" class="btn btn-pink add-to-cart"
                                                data-p-id="{{ $product->id }}">
                                                Add To Cart
                                            </a>
                                        @endif

                                        <button class="btn btn-primary btn-black" type="submit">
                                            Buy Now
                                        </button>

                                        @if ($product->isInWishlist())
                                            <button type="button" class="btn mt-sm-0 mt-3 p-show add-to-wish active"
                                                data-p-id="{{ $product->id }}">
                                                <i class="fa-regular fa-heart"></i>
                                                <span class="tool-tip-text">
                                                    Remove From Wishlist
                                                </span>
                                            </button>
                                        @else
                                            <button type="button" class="btn mt-sm-0 mt-3 p-show add-to-wish"
                                                data-p-id="{{ $product->id }}">
                                                <i class="fa-regular fa-heart"></i>
                                                <span class="tool-tip-text">
                                                    Add To Wishlist
                                                </span>
                                            </button>
                                        @endif
                                    </div>
                                </form>

                                <h6 class="h5 font-body">
                                    Description
                                </h6>
                                <ul class="ms-3 text-muted">
                                    <li class="text-capitalize">
                                        {!! $product->descriptions !!}
                                    </li>
                                </ul>
                                {{-- <h6 class="h5 font-body">
                                        Main Ingredients
                                    </h6>
                                    <ul class="ms-3 text-muted">
                                        <li>
                                           dfskjsk k k fgkjfsg dfk fkj df sfj sd
                                        </li>
                                        <li>
                                            dfskjsk k k fgkjfsg dfk fkj df sfj sd
                                         </li>
                                         <li>
                                            dfskjsk k k fgkjfsg dfk fkj df sfj sd
                                         </li>
                                    </ul> --}}
                                {{-- <h6 class="h5 font-body">
                                        How to use
                                    </h6>
                                    <p class="text-muted">
                                        Apply essence Long Lasting Eye Pencil directly to the lash and waterline of the eye.
                                    </p> --}}
                            </div>
                            <div class="rating-holder">
                                <div class="row">
                                    <div class="col-12 col-sm-6 p-0">
                                        <div class="rating">
                                            <div class="d-flex align-items-center">
                                                <h6 class="h5 font-body mb-0 me-2">
                                                    Ratings
                                                </h6>
                                                <div class="five-stars text-green d-flex">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $reviewRatingAvg)
                                                            <i class="fa-solid fa-star"></i>
                                                        @else
                                                            <i class="fa-regular fa-star"></i>
                                                        @endif
                                                    @endfor
                                                    {{-- <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i> --}}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="rating-total d-flex align-items-center me-3">
                                                    <h6 class="h2 text-muted font-body mb-0">
                                                        {{ $reviewRatingAvg }}
                                                    </h6>
                                                    <i class="fa-solid fa-star text-green"></i>
                                                </div>
                                                {{-- <div class="rating-count text-muted">
                                                    Based On Verified Buyers 1k
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 p-0">
                                        <div class="rating-stats text-muted">

                                            @for ($i = 5; $i >= 1; $i--)
                                                <div class="rating-stat">
                                                    <div>{{ $i }}</div>
                                                    <div class="review-bar">
                                                        <div class="review-bar-value"
                                                            style="width: {{ $ratingsArr[$i] }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- detial Holder of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Product detial of the Page end -->
        <section>
            <div class="container">

                <div class="row">
                    <div class="col-lg-7 col-md-12 product-showpagepills">
                        <ul class="nav nav-pills justify-content-between prdct-pills-tab p-0" id="myTab" role="tablist">
                            <li class="nav-item prdct-pills-f1">
                                <a class="nav-link active p-0" id="home-tab" data-bs-toggle="pill" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">
                                    <h5 class="main-head tab-fs">Customer Reviews</h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0" id="profile-tab" data-bs-toggle="pill" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">
                                    <h5 class="main-head">Write A Review</h5>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="container">
                                    @forelse ($reviews as $re)
                                        <div class="review-area">
                                            <div class="review-card ">
                                                <div class="d-flex align-items-center">

                                                    <div class="review-user">
                                                        <img src="https://via.placeholder.com/150" alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex review-head">
                                                            <div class="five-stars text-green d-flex">
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-regular fa-star"></i>
                                                            </div>
                                                            <div class="review-title">
                                                                <h5 class="font-body">
                                                                    {{ $re->title }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="review-content">

                                                    <div class="review-text">
                                                        <p>
                                                            {{ $re->body }}
                                                        </p>
                                                    </div>
                                                    <div class="review-gallery d-flex">
                                                        <div class="review-gallery-item me-2">
                                                            <img src="https://via.placeholder.com/600" class="rounded-4"
                                                                alt="">
                                                        </div>
                                                        <div class="review-gallery-item me-2">
                                                            <img src="https://via.placeholder.com/600" class="rounded-4"
                                                                alt="">
                                                        </div>
                                                        <div class="review-gallery-item me-2">
                                                            <img src="https://via.placeholder.com/600" class="rounded-4"
                                                                alt="">
                                                        </div>
                                                        <div class="review-gallery-item me-2">
                                                            <img src="https://via.placeholder.com/600" class="rounded-4"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="review-info text-muted d-flex flex-wrap justify-content-between">
                                                        <div class="py-2">
                                                            Kiran22
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            | June 2020
                                                        </div>
                                                        <div class="py-2">
                                                            <button class="text-muted p-0 btn">
                                                                <i class="fa-solid fa-thumbs-up"></i>
                                                                200
                                                            </button>
                                                            |
                                                            <button class="text-muted p-0 btn">
                                                                <i class="fa-solid fa-thumbs-down"></i>
                                                                10
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">No Reviews</p>
                                    @endforelse
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $reviews->onEachSide(1)->links('pagination::bootstrap-4') }}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form action="{{ route('frontend.review.store', $product->slug) }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-between flex-column flex-sm-row gap-1">
                                        <div>Give Your Rating</div>

                                        <div class="rating-input">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label class="star" for="star5" title="Awesome"
                                                aria-hidden="true"></label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label class="star" for="star4" title="Great"
                                                aria-hidden="true"></label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label class="star" for="star3" title="Very good"
                                                aria-hidden="true"></label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label class="star" for="star2" title="Good"
                                                aria-hidden="true"></label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label class="star" for="star1" title="Bad"
                                                aria-hidden="true"></label>
                                        </div>
                                    </div>
                                    @if ($errors->has('rating'))
                                        <div class="text-danger text-end" role="alert">{{ $errors->first('rating') }}
                                        </div>
                                    @endif

                                    <div class="py-4">
                                        <input type="text"
                                            class="form-control my-2 review-sub-headline review-input-bg"
                                            placeholder="Enter Title" name="title" required
                                            value="{{ old('title') }}">
                                        @if ($errors->has('title'))
                                            <div class="text-danger" role="alert">{{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <textarea name="body" id="body" cols="10" rows="3"
                                            class="mt-3 form-control w-100  review-sub-textarea review-input-bg" placeholder="Enter Your Review" required>{{ old('body') }}</textarea>
                                        @if ($errors->has('body'))
                                            <div class="text-danger" role="alert">{{ $errors->first('body') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-pink">Post Your Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

                <hr>
                {{-- <div class="row pb-4" style="padding-top:2px;">
                    <h5 class="main-head py-3 or-secondpage-scard-fhead text-capitalize">Recommended based on your
                        purchase</h5>
                     @forelse ($cProducts as $cp)
                        <div class="col-lg-12 col-xl-6 or-secondpage-scard">
                            <div class="p-4 or-secondpage-scard">
                                <div class="row pt-3 pb-3 or-secondpage-scard-card">
                                    <div class="col-sm-4 or-secondpage-scard-card-img" style="">
                                        <img src="{{ asset('frontend/images/products/skin/sk1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="col-sm-8 or-secondpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
                                        <h4 class="main-head text-capitalize">{{ $cp->short_descriptions }}</h4>
                                        <p class="text-capitalize">
                                            {{ strip_tags($cp->descriptions) }}
                                        </p>
                                        <ul class="d-flex gap-5 p-0">
                                            <li class="no-bullet fw-bolder">
                                                From {{ $cp->final_price }}
                                            </li>
                                            <li>{{ dd_format($cp->created_at, 'd-m-Y') }}</li>
                                        </ul>
                                    </div>

                                </div>
                                <button type="button" class="btn btn-orange or-secondpage-lbtn mt-4">Continue
                                    Shopping</button>

                            </div>
                        </div>
                    @empty
                        <p class="text-center">No Recommended Products</p>
                    @endforelse
                </div> --}}
                {{-- <div class="d-flex justify-content-center mt-4">
                    {{ $cProducts->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div> --}}


            </div>


        </section>
    </main>

    <div class="container">
        <div class="row">
            <h5 class="main-head py-3 or-secondpage-scard-fhead text-capitalize">
                Recommended Products
            </h5>
            <div class="col-sm-12">

                <ul id="subcategory-slider">

                    @foreach ($relatedProducts as $rP)
                        <div class="product-show-grid">

                            <div class=" product-show-grid-card ">
                                <div class="product-card-img">
                                    @if ($rP->isInWishlist())
                                        <button class="btn wishlist add-to-wish active" data-p-id="{{ $rP->id }}">
                                            <span class="has-tool-tip">
                                                <i class="fa-regular fa-heart"></i>
                                                <span class="tool-tip-text">Remove From Wishlist</span>
                                            </span>
                                        </button>
                                    @else
                                        <button class="btn wishlist add-to-wish" data-p-id="{{ $rP->id }}">
                                            <span class="has-tool-tip">
                                                <i class="fa-regular fa-heart"></i>
                                                <span class="tool-tip-text">Add to Wishlist</span>
                                            </span>
                                        </button>
                                    @endif
                                    <img src="{{ asset('storage/images/products/' . $rP->thumbnail_image) }}"
                                        alt="...">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title font-head fw-bold">
                                        {{ $rP->name }}
                                    </h4>
                                    <div class="price">
                                        ₹{{ $rP->final_price }} <s class="text-danger">₹{{ $rP->mrp }}</s>
                                    </div>
                                    <div class="buttons">
                                        <a href="{{ route('frontend.p.show', $rP->slug) }}" class="btn btn-orange">
                                            Shop now
                                        </a>
                                        @if ($rP->isInCart())
                                            <a href="javascript:void(0)" class="btn btn-pink add-to-cart btn-outline-pink"
                                                data-p-id="{{ $rP->id }}">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                    data-prefix="fas" data-icon="check" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                                    </path>
                                                </svg> Added
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" class="btn btn-pink add-to-cart"
                                                data-p-id="{{ $rP->id }}">
                                                Add To Cart
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach


                </ul>


            </div>
        </div>
    </div>

    <style>
        .p-show.add-to-wish {
            border: 0;
        }

        .p-show.add-to-wish.active {
            background: #fff !important;
            color: #ec268f !important;
        }

        .p-show.add-to-wish.active svg path {
            fill: #ec268f;
        }
    </style>
@endsection
