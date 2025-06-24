@extends('frontend.layouts.app')
@section('title', $product->name . ' |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@push('meta')
    <meta name="keywords" content="{{ count($tags) ? implode(', ', $tags) : $product->name }}">
    <meta name="description" content="{{ $product->short_descriptions ?? $product->name }}">
    <meta property="og:title" content="{{ $product->name }}">
    <meta property="og:description" content="{{ $product->short_descriptions ?? $product->name }}">
    <meta property="og:image" content="{{ asset('storage/images/products/thumbnails/' . $product->thumbnail_image) }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta name="twitter:card" content="{{ asset('storage/images/products/thumbnails/' . $product->thumbnail_image) }}">
@endpush
@section('content')

    <main id="mt-main">

        <section class="my-1 mt-3">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.cat.show', $category->slug) }}"
                                class="bread-crum breadcrumb-hover fw-400 opacity-50 fs-14">{{ $category->name }}</a></li>
                        @if ($subCategory)
                            <li class="breadcrumb-item d-flex align-items-center"><a
                                    href="{{ route('frontend.sub-category.show', [$category->slug, $subCategory->slug]) }}"
                                    class="bread-crum breadcrumb-hover  fw-400 opacity-50 fs-14">{{ $subCategory->name }}</a>
                            </li>
                        @endif
                        {{-- <li class="breadcrumb-item bread-crum" aria-current="page">{{ $product->name }}</li> --}}
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Mt Product detial of the Page -->
        <section class="mt-product-detial mt-0 mt-sm-4" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Slider of the Page -->
                        <div class="slider {{ count($product->medias) == 1 ? 'full-width' : '' }}">
                            <div class="product-slider">
                                @foreach ($product->medias as $media)
                                    <div class="slide ">
                                        <img src="{{ asset('storage/images/products/' . $media->file_name) }}"
                                            alt="image description" class="pro-slide-pa">
                                    </div>
                                @endforeach
                            </div>

                            <ul
                                class="list-unstyled slick-slider pagg-slider subslider-product m-0 p-0 {{ count($product->medias) == 1 ? 'hidesubslide' : '' }}">
                                @foreach ($product->medias as $media)
                                    <li class="subslider-list">
                                        <div class="img">
                                            <img src="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                alt="image description" class="min-h-2-80 subslider-list-img">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Pagg Slider of the Page end -->
                        </div>

                        <div class="detial-holder mt-0 mt-sm-3 mt-lg-0">
                            <h1 class="h4 font-body fs-16">
                                {{ $product->name }}

                            </h1>
                            <hr class="d-none d-sm-block">
                            {{-- @if ($product->short_descriptions)
                                <p class="text-muted fs-11">
                                    {{ $product->short_descriptions }}
                                </p>
                            @endif --}}

                            {{-- for small screen --}}
                            <div class="d-flex d-sm-none flex-row  justify-content-between align-items-start stock-width">
                                @if ($product->stock)
                                    <h4 class="font-body h5 text-green in-stock mb-0 font-size14 fs-9">In Stock
                                        <i class="fa-regular fa-circle-check"></i>
                                    </h4>
                                @else
                                    <h4 class="font-body h5 text-red font-size14 fs-9">Out of Stock
                                        <i class="fa-regular fa-circle-xmark"></i>
                                    </h4>
                                @endif
                            </div>

                            {{-- for  large screen --}}
                            <div class="d-none d-sm-flex flex-row  justify-content-between align-items-start stock-width">
                                <div>
                                    <h3 class="h6 font-body rem-1">
                                        From ₹{{ $product->final_price }} <s
                                            class="text-muted">₹{{ $product->mrp }}</s><br>
                                        @if ($product->unit_sale_price)
                                            <small class="d-block"
                                                style="font-size: 85%;">({{ $product->unit_sale_price }})</small>
                                        @endif
                                    </h3>

                                </div>
                                @if ($product->stock)
                                    <h4 class="font-body h5 text-green in-stock mb-0 font-size14">In Stock
                                        <i class="fa-regular fa-circle-check"></i>
                                    </h4>
                                @else
                                    <h4 class="font-body h5 text-red font-size14">Out of Stock
                                        <i class="fa-regular fa-circle-xmark"></i>
                                    </h4>
                                @endif

                            </div>


                            <div class="row">
                                <form action="{{ route('frontend.p.checkout', $product->slug) }}" method="GET">

                                    {{-- for small screen --}}
                                    <div class="d-flex d-sm-none flex-column flex-xl-row justify-content-between my-3 ">


                                        <div class="d-flex justify-content-between align-items-center">


                                            <div>
                                                <h3 class="h6 font-body rem-1 m-0 fs-12">
                                                    From ₹{{ $product->final_price }} <s
                                                        class="text-danger">₹{{ $product->mrp }}</s><br>
                                                    @if ($product->unit_sale_price)
                                                        <small class="d-block"
                                                            style="font-size: 85%;">({{ $product->unit_sale_price }})</small>
                                                    @endif
                                                </h3>
                                            </div>

                                            @if ($product->stock)
                                                <div class="qty-counter my-1 my-sm-0 my-md-3 my-lg-0">
                                                    <label for="qty" class="px-2 fs-10">
                                                        Qty
                                                    </label>
                                                    <div class="input-group flex-nowrap counter qty-num-input">
                                                        <button type="button"
                                                            class="input-group-text decrease-quantity fs-10">-</button>
                                                        <input type="number" name="quantity"
                                                            class="form-control quantity-input fs-10" value="1"
                                                            id="product_quantity"
                                                            style="border-left: 0px;border-right: 0px;padding-left:0px;padding-right:0px">
                                                        <button type="button"
                                                            class="input-group-text increase-quantity fs-10">+</button>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>





                                        <div
                                            class="d-flex justify-content-between justify-content-sm-start justify-content-lg-end justify-content-xl-between gap-1 gap-sm-3 mt-3 mt-xl-0  ">



                                            <div>
                                                @if (in_array($product->id, $wishlist))
                                                    <button type="button"
                                                        class=" btn  p-show add-to-wish-showpage active d-flex align-items-center justify-content-center gap-1 btn-size-width109 whishlist-new-style px-0 px-sm-0"
                                                        data-p-id="{{ $product->id }}">

                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="#EC268F" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.3601 0.785925C10.5128 -0.642086 8.23172 0.0243193 7.00019 1.6586C5.76867 0.0243193 3.48754 -0.65002 1.64025 0.785925C0.66063 1.54753 0.0448663 2.83274 0.00288251 4.18935C-0.0950797 7.26751 2.312 9.7348 5.98558 13.519L6.05555 13.5904C6.58735 14.1378 7.40604 14.1378 7.93783 13.5825L8.0148 13.5032C11.6884 9.72687 14.0885 7.25958 13.9975 4.18142C13.9555 2.83274 13.3398 1.54753 12.3601 0.785925ZM7.07017 12.337L7.00019 12.4163L6.93022 12.337C10.149 10 9 7.79275 9 5.5C9 3.91332 6.53837 6.5 7.93783 6.5C9.01542 6.5 5.97858 2.37261 6.34944 3.45948H7.65794C8.0218 2.37261 8.42242 4 9.5 4C10.5 2.5 5.5 1.8728 5.5 3.45948C5.5 5.75223 5.5 10.5 7.07017 12.337Z"
                                                                fill="#EC268F" />
                                                        </svg>

                                                        <span class="tool-tip-text-showpage font-size14 ">
                                                            Wishlisted
                                                        </span>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn m-0 p-show add-to-wish-showpage   btn-size-width109  d-flex align-items-center justify-content-center gap-1 btn-size-width109 whishlist-new-style whishlist-new-style"
                                                        data-p-id="{{ $product->id }}">


                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.3601 0.785926C10.5128 -0.642086 8.23172 0.0243193 7.00019 1.6586C5.76867 0.0243193 3.48754 -0.65002 1.64025 0.785926C0.66063 1.54753 0.0448664 2.83274 0.00288252 4.18935C-0.0950798 7.26751 2.312 9.7348 5.98558 13.519L6.05556 13.5904C6.58735 14.1378 7.40604 14.1378 7.93783 13.5825L8.0148 13.5032C11.6884 9.72687 14.0885 7.25958 13.9975 4.18142C13.9555 2.83274 13.3398 1.54753 12.3601 0.785926ZM7.07017 12.337L7.00019 12.4163L6.93022 12.337C3.5995 8.91766 1.40234 6.65664 1.40234 4.36389C1.40234 2.77721 2.45194 1.5872 3.8514 1.5872C4.92899 1.5872 5.97858 2.37261 6.34944 3.45948H7.65794C8.0218 2.37261 9.0714 1.5872 10.149 1.5872C11.5484 1.5872 12.598 2.77721 12.598 4.36389C12.598 6.65664 10.4009 8.91766 7.07017 12.337Z"
                                                                fill="#EC268F" />
                                                        </svg>


                                                        <span class="tool-tip-text-showpage font-size14 ">
                                                            Wishlist
                                                        </span>
                                                    </button>
                                                @endif
                                            </div>

                                            @if (in_array($product->id, $productInCart))
                                                <a href="javascript:void(0)"
                                                    class="btn btn-pink add-to-cart btn-outline-pink  font-size14 btn-size-width109 gap-1"
                                                    data-p-id="{{ $product->id }}" style="">
                                                    <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="check"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                                        </path>
                                                    </svg>
                                                    <span>Added</span>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)"
                                                    class=" btn btn-pink add-to-cart d-flex align-items-center btn-size-width109 font-size14"
                                                    data-p-id="{{ $product->id }}">
                                                    Add To Cart
                                                </a>
                                            @endif

                                            @if ($product->stock)
                                                <button class="btn btn-black font-size14 btn-size-width109"
                                                    type="submit">
                                                    Buy Now
                                                </button>
                                            @endif

                                        </div>
                                    </div>


                                    {{-- for large screen --}}
                                    <div
                                        class="d-none d-sm-flex flex-column flex-sm-row flex-lg-column flex-xl-row justify-content-between my-3 ">
                                        <div class="d-flex align-items-center gap-3">




                                            <div>
                                                @if (in_array($product->id, $wishlist))
                                                    <button type="button"
                                                        class=" btn  p-show add-to-wish-showpage active d-flex align-items-center justify-content-center gap-1 btn-size-width109 whishlist-new-style"
                                                        data-p-id="{{ $product->id }}" style="width:117px">

                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="#EC268F" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.3601 0.785925C10.5128 -0.642086 8.23172 0.0243193 7.00019 1.6586C5.76867 0.0243193 3.48754 -0.65002 1.64025 0.785925C0.66063 1.54753 0.0448663 2.83274 0.00288251 4.18935C-0.0950797 7.26751 2.312 9.7348 5.98558 13.519L6.05555 13.5904C6.58735 14.1378 7.40604 14.1378 7.93783 13.5825L8.0148 13.5032C11.6884 9.72687 14.0885 7.25958 13.9975 4.18142C13.9555 2.83274 13.3398 1.54753 12.3601 0.785925ZM7.07017 12.337L7.00019 12.4163L6.93022 12.337C10.149 10 9 7.79275 9 5.5C9 3.91332 6.53837 6.5 7.93783 6.5C9.01542 6.5 5.97858 2.37261 6.34944 3.45948H7.65794C8.0218 2.37261 8.42242 4 9.5 4C10.5 2.5 5.5 1.8728 5.5 3.45948C5.5 5.75223 5.5 10.5 7.07017 12.337Z"
                                                                fill="#EC268F" />
                                                        </svg>

                                                        <span class="tool-tip-text-showpage font-size14 ">
                                                            Wishlisted
                                                        </span>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn m-0 p-show add-to-wish-showpage   btn-size-width109 whishlist-new-style"
                                                        data-p-id="{{ $product->id }}" style="width:117px">

                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.3601 0.785926C10.5128 -0.642086 8.23172 0.0243193 7.00019 1.6586C5.76867 0.0243193 3.48754 -0.65002 1.64025 0.785926C0.66063 1.54753 0.0448664 2.83274 0.00288252 4.18935C-0.0950798 7.26751 2.312 9.7348 5.98558 13.519L6.05556 13.5904C6.58735 14.1378 7.40604 14.1378 7.93783 13.5825L8.0148 13.5032C11.6884 9.72687 14.0885 7.25958 13.9975 4.18142C13.9555 2.83274 13.3398 1.54753 12.3601 0.785926ZM7.07017 12.337L7.00019 12.4163L6.93022 12.337C3.5995 8.91766 1.40234 6.65664 1.40234 4.36389C1.40234 2.77721 2.45194 1.5872 3.8514 1.5872C4.92899 1.5872 5.97858 2.37261 6.34944 3.45948H7.65794C8.0218 2.37261 9.0714 1.5872 10.149 1.5872C11.5484 1.5872 12.598 2.77721 12.598 4.36389C12.598 6.65664 10.4009 8.91766 7.07017 12.337Z"
                                                                fill="#EC268F" />
                                                        </svg>


                                                        <span class="tool-tip-text-showpage font-size14 ">
                                                            Wishlist
                                                        </span>

                                                    </button>
                                                @endif
                                            </div>

                                            @if (in_array($product->id, $productInCart))
                                                <a href="javascript:void(0)"
                                                    class="btn btn-pink add-to-cart btn-outline-pink  font-size14 btn-size-width109 gap-1 d-flex align-items-center justify-content-center "
                                                    data-p-id="{{ $product->id }}" style="">
                                                    <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="check"
                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                                        </path>
                                                    </svg>
                                                    <span>Added</span>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)"
                                                    class=" btn btn-pink add-to-cart d-flex align-items-center justify-content-center btn-size-width109 font-size14"
                                                    data-p-id="{{ $product->id }}">
                                                    Add To Cart
                                                </a>
                                            @endif

                                        </div>

                                        @if ($product->stock)
                                            <div
                                                class="d-flex justify-content-between justify-content-sm-start justify-content-lg-end justify-content-xl-between align-items-center gap-1 gap-sm-3 mt-0 mt-lg-3 mt-xl-0  ">



                                                <div class="qty-counter my-1 my-sm-0 my-md-3 my-lg-0">
                                                    <label for="qty" class="px-2">
                                                        Qty
                                                    </label>
                                                    <div class="input-group flex-nowrap counter qty-num-input">
                                                        <button type="button"
                                                            class="input-group-text decrease-quantity">-</button>
                                                        <input type="number" name="quantity"
                                                            class="form-control quantity-input" value="1"
                                                            id="product_quantity"
                                                            style="border-left: 0px;border-right: 0px;padding-left:0px;padding-right:0px">
                                                        <button type="button"
                                                            class="input-group-text increase-quantity">+</button>
                                                    </div>
                                                </div>

                                                <button class="btn btn-buy font-size14 btn-size-width109" type="submit">
                                                    Buy Now
                                                </button>

                                            </div>
                                        @endif
                                    </div>


                                </form>


                                <hr class="d-none d-sm-block">

                                {{-- @if ($product->brand)
                                    <h6 class="h5 font-body fs-14">
                                        {{ $product->brand->name }}
                                    </h6>
                                @endif --}}
                                @if ($product->descriptions)
                                    <ul class="text-black fs-11 fw-sm-300">
                                        {!! $product->descriptions !!}
                                    </ul>
                                    <hr class="d-none d-sm-block">
                                @endif
                            </div>
                            <div class="rating-holder">
                                <div class="row">

                                    <div class="col-12 col-sm-12 p-0">

                                        {{-- <div class="col-6 col-sm-12 p-0">

                                            <div class="text-black fs-11">
                                                @if ($product->brand)
                                                    <div class="pb-2">Brand : <span
                                                            class="fw-500">{{ $product->brand->name }}</span> </div>
                                                @endif
                                                @if ($product_attributes->count())
                                                    @foreach ($product_attributes as $product_attribute)
                                                        <div class="pb-2">
                                                            {{ $product_attribute->attribute->name . ' : ' }} <span
                                                                class="fw-500">{{ $product_attribute->value->name }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                @if ($product->material)
                                                    <div class="pb-2">Material : <span
                                                            class="fw-500">{{ $product->material }}</span> </div>
                                                @endif

                                                @if ($product->skin_type)
                                                    <div class="pb-2">Skin Type : <span
                                                            class="fw-500">{{ $product->skin_type }}</span></div>
                                                @endif
                                                @if ($product->net_quantity)
                                                    <div class="pb-2">Net Quantity : <span
                                                            class="fw-500">{{ $product->net_quantity }}</span></div>
                                                @endif
                                                @if ($product->care_instruction)
                                                    <div class="pb-2">Care Instruction : <span
                                                            class="fw-500">{{ $product->care_instruction }}</span>
                                                    </div>
                                                @endif
                                                @if ($product->special_ingredients)
                                                    <div class="pb-2">Special Ingredients : <span
                                                            class="fw-500">{{ $product->special_ingredients }}</span>
                                                    </div>
                                                @endif

                                                @if ($product->expiry)
                                                    <div class="pb-2">Expiry : <span
                                                            class="fw-500">{{ $product->expiry }}</span>
                                                    </div>
                                                @endif
                                            </div>

                                        </div> --}}

                                        <div class="data-propety-table fs-14 py-2">
                                            @if ($product->brand)
                                                <div class="data-propety-tr pb-2">
                                                    <div class="fss-14 fw-500">Brand</div>
                                                    <div class="fss-14 fw-300">{{ $product->brand->name }}</div>
                                                </div>
                                            @endif
                                            @foreach ($product_attributes as $pa)
                                                <div class="data-propety-tr pb-2">
                                                    <div class="fss-14 fw-500">{{ $pa->attribute->name }}</div>
                                                    <div class="fss-14 fw-300">{{ $pa->value->name }}</div>
                                                </div>
                                            @endforeach
                                            @if ($product->skin_type)
                                                <div class="data-propety-tr pb-2">
                                                    <div class="fss-14 fw-500">Skin Type</div>
                                                    <div class="fss-14 fw-300">{{ $product->skin_type }}</div>
                                                </div>
                                            @endif
                                            @if ($product->net_quantity)
                                                <div class="data-propety-tr pb-2">
                                                    <div class="fss-14 fw-500">Net Quantity</div>
                                                    <div class="fss-14 fw-300">{{ $product->net_quantity }}</div>
                                                </div>
                                            @endif
                                            @if ($product->care_instruction)
                                                <div class="data-propety-care-instruction pb-2">
                                                    <div class="fss-14 fw-500">Care Instruction</div>
                                                    <div class="fss-14 fw-300">{{ $product->care_instruction }}</div>
                                                </div>
                                            @endif
                                            @if ($product->special_ingredients)
                                                <div class="data-propety-care-instruction pb-2">
                                                    <div class="fss-14 fw-500">Special Ingredients</div>
                                                    <div class="fss-14 fw-300">{{ $product->special_ingredients }}</div>

                                                </div>
                                            @endif
                                            @if ($product->expiry)
                                                <div class="data-propety-care-instruction pb-2">
                                                    <div class="fss-14 fw-500">Expiry Date</div>
                                                    <div class="fss-14 fw-300">{{ $product->expiry }}</div>

                                                </div>
                                            @endif

                                        </div>

                                        <div class="col-12 col-sm-12 p-0 mt-3">

                                            <div class="rating-grid-stm">
                                                <div class="rating-stats text-muted">
                                                    <div class="rating">
                                                        <div class="d-flex align-items-center mb-1">
                                                            <h6 class="h6 font-body mb-0 me-2 fw-500 text-black fs-9">
                                                                Ratings
                                                            </h6>
                                                            <div
                                                                class="five-stars five-stars-main text-green d-flex gap-1 ">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $reviewRatingAvg)
                                                                        <i class="fa-solid fa-star"></i>
                                                                    @else
                                                                        <i class="fa-regular fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="py-1 py-sm-2">
                                                            <div class="rating-total position-relative isolate ">
                                                                <div
                                                                    style="box-shadow: 0px 1px 0.8999999761581421px 0px #00000040;background: white;border-radius:4px;padding: 6px;padding-top: 9px;">
                                                                    <h6 class="h5 font-body text-muted fs-11 m-0">
                                                                        {{ $reviewRatingAvg }}
                                                                    </h6>
                                                                    <i
                                                                        class="fa-solid fa-star text-green position-absolute "></i>
                                                                </div>
                                                                {{-- <h6 class="m-0 p-0 main-head fs-md-9">Based On Verified Buyers</h6> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="rating-stats text-muted">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <div class="">
                                                            <div class="rating-stat">
                                                                <div class="fs-8">{{ $i }}</div>
                                                                <div class="review-bar">
                                                                    <div class="review-bar-value"
                                                                        style="width: {{ $ratingsArr[$i] }}%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section><!-- Mt Product detial of the Page end -->

        <hr class="d-block d-sm-none margin-sm">

        <section>
            <div class="container">

                <div class="row">


                    <div class="my-0 py-3 py-lg-0 my-lg-2 col-lg-6 col-md-12 product-showpagepills pills-divider-border">

                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-xl-10">

                                <div class=" d-flex justify-content-start justify-content-sm-center mb-2 mb-sm-4">
                                    <h5 class="main-head tab-fs py-0 py-sm-2 pills-divider-h5 h2 fw-500 fs-14">Write a
                                        Reviews</h5>
                                </div>

                                <div class="tab-content my-0 my-sm-0">

                                    <div class="">
                                        <form action="{{ route('frontend.review.store', $product->slug) }}"
                                            method="POST">
                                            @csrf
                                            <div class="d-flex justify-content-between flex-row align-items-center gap-1">
                                                <div class="fw-400 h5 text-black fs-12 m-0">Give Your Rating</div>

                                                <div class="rating-input">
                                                    <input type="radio" id="star5" name="rating"
                                                        value="5" />
                                                    <label class="star" for="star5" title="Awesome"
                                                        aria-hidden="true"></label>
                                                    <input type="radio" id="star4" name="rating"
                                                        value="4" />
                                                    <label class="star" for="star4" title="Great"
                                                        aria-hidden="true"></label>
                                                    <input type="radio" id="star3" name="rating"
                                                        value="3" />
                                                    <label class="star" for="star3" title="Very good"
                                                        aria-hidden="true"></label>
                                                    <input type="radio" id="star2" name="rating"
                                                        value="2" />
                                                    <label class="star" for="star2" title="Good"
                                                        aria-hidden="true"></label>
                                                    <input type="radio" id="star1" name="rating"
                                                        value="1" />
                                                    <label class="star" for="star1" title="Bad"
                                                        aria-hidden="true"></label>
                                                </div>
                                            </div>
                                            @if ($errors->has('rating'))
                                                <div class="text-danger text-end fs-11" role="alert">
                                                    {{ $errors->first('rating') }}
                                                </div>
                                            @endif

                                            <div class="pt-sm-4 pb-sm-4 pt-0 pb-4">
                                                <input type="text"
                                                    class="form-control my-2 review-sub-headline review-input-bg fs-9"
                                                    placeholder="Enter Title" name="title" required
                                                    value="{{ old('title') }}" minlength="3" maxlength="120">
                                                @if ($errors->has('title'))
                                                    <div class="text-danger" role="alert">{{ $errors->first('title') }}
                                                    </div>
                                                @endif
                                                <textarea name="body" id="body" cols="10" rows="3"
                                                    class="mt-3 form-control w-100  review-sub-textarea review-input-bg fs-9" placeholder="Enter Your Review"
                                                    minlength="3" maxlength="1000" required>{{ old('body') }}</textarea>
                                                @if ($errors->has('body'))
                                                    <div class="text-danger" role="alert">{{ $errors->first('body') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="">

                                                {{-- <div class="up-image-label">
                                                    <label for="files" class="btn btn-lg fw-500 d-flex align-items-center gap-2" >
                                                        <img src="{{asset('frontend/images/icons/upload-icon.svg')}}" alt="" class="img-fluid" style="width: 17px">
                                                        <div class="h6 mb-0 up-fontSize">
                                                            Upload Photos
                                                        </div>
                                                    </label>
                                                    <input id="files" style="visibility:hidden;" type="file">
                                                  </div>    --}}
                                                <div class="text-start text-sm-end">
                                                    <button type="submit" class="btn btn-darkwhite up-fontSize">Post Your
                                                        Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="my-0 my-lg-2 col-lg-6 col-md-12 product-showpagepills pills-divider-border ">

                        <div class="row d-flex justify-content-center  position-relative">
                            <div class="position-absolute d-none d-lg-block"
                                style="height: 72px;width: 1px;background: #979797;left: 0px;padding:0;top:15px"></div>

                            <div class="col-12 col-xl-10">

                                <div
                                    class="pills-divider d-flex justify-content-start justify-content-sm-center px-0 px-lg-3 mb-sm-4 mb-0">
                                    <h5 class="main-head tab-fs pills-divider-h5 py-sm-2 py-0 h2 fw-500 fs-14 m-0">Customer
                                        Reviews</h5>
                                </div>

                                <div class="tab-content my-3 my-sm-4">
                                    <div class="tab-pane fade show active" id="home" aria-labelledby="home-tab">
                                        <div class="container p-0 px-0 px-lg-3">
                                            @forelse ($reviews as $re)
                                                <div class="review-area">
                                                    <div class="review-card ">
                                                        <div class="d-flex align-items-center justify-content-between">

                                                            <div class="review-user d-flex gap-3 align-items-center">
                                                                <img src="{{ $user && $user->profile_image ? asset('storage/images/profile/' . $user->profile_image) : asset('frontend/images/user-pic.png') }}"
                                                                    alt="">
                                                                <div class="review-title">
                                                                    <h6 class="font-body  posting-title "
                                                                        style="font-size: 14px">
                                                                        {{ $re->title }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="d-flex review-head">
                                                                    <div
                                                                        class="five-stars five-stars-main text-green d-flex gap-2">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $re->rating)
                                                                                <i
                                                                                    class="fa-solid fa-star cust-output-review"></i>
                                                                            @else
                                                                                <i
                                                                                    class="fa-regular fa-star cust-output-review"></i>
                                                                            @endif
                                                                        @endfor
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="review-content pb-3">

                                                            <div class="review-text mb-0">
                                                                <p class="tinywhite fs-10">
                                                                    {!! nl2br($re->body) !!}
                                                                </p>
                                                            </div>


                                                            {{-- <div class="uploaded-product-img ">
                                                                <img src="https://placehold.co/115x115" alt="" srcset="" class="img-fluid rounded-3">
                                                                <img src="https://placehold.co/115x115" alt="" srcset="" class="img-fluid rounded-3">
                                                                <img src="https://placehold.co/115x115" alt="" srcset="" class="img-fluid rounded-3">
                                                                <img src="https://placehold.co/115x115" alt="" srcset="" class="img-fluid rounded-3">
                                                            </div>  --}}

                                                            <div
                                                                class="review-info text-muted d-flex flex-wrap justify-content-between py-2">
                                                                <div class="py-2 fs-14 fw-400 text-black">
                                                                    {{ $re->user->first_name ?? 'Anonymous' }}
                                                                    | {{ dd_format($re->created_at, 'd M-Y') }}
                                                                </div>

                                                                {{-- <div class="d-flex align-items-center gap-2 gap-sm-4">
                                                                    <div class="d-flex gap-1 gap-sm-2 align-items-center">
                                                                        <button class="border-0 bg-transparent">
                                                                            <img src="{{asset('frontend/images/icons/like.svg')}}" alt="" class="img-fluid likeimg">
                                                                        </button>
                                                                        <div class="fs-14">200</div>
                                                                    </div>

                                                                    <div>|</div>

                                                                    <div class="d-flex gap-1 gap-sm-2 align-items-center">
                                                                        <button class="border-0 bg-transparent">
                                                                            <img src="{{asset('frontend/images/icons/dislike.svg')}}" alt="" class="img-fluid dislikeimg">
                                                                        </button>
                                                                        <div class="fs-14">200</div>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p class="text-center my-4">No Reviews</p>
                                            @endforelse
                                        </div>
                                        <div class="d-flex justify-content-center mt-4">
                                            {{ $reviews->onEachSide(1)->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>



                                </div>
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
                        <div class="product-show-grid my-3 mx-2">

                            <div class="product-show-grid-card">

                                <div class="product-card-img">
                                    @if (in_array($rP->id, $wishlist))
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
                                    <a href="{{ route('frontend.p.show', $rP->slug) }}">
                                        <img src="{{ asset('storage/images/products/thumbnails/' . $rP->thumbnail_image) }}"
                                            alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title font-head fw-bold" title="{{ $rP->name }}">
                                        <a href="{{ route('frontend.p.show', $rP->slug) }}">
                                            {{ str_limit($rP->name, 50) }}
                                        </a>
                                    </h4>
                                    <div class="price">
                                        ₹{{ $rP->final_price }} <s class="text-danger">₹{{ $rP->mrp }}</s>
                                    </div>
                                    <div class="buttons">
                                        <a href="{{ route('frontend.p.show', $rP->slug) }}" class="btn btn-orange"
                                            title="{{ $rP->name }}">
                                            Shop now
                                        </a>
                                        @if (in_array($rP->id, $productInCart))
                                            <a href="javascript:void(0)" class="btn btn-pink add-to-cart btn-outline-pink"
                                                data-p-id="{{ $rP->id }}" data-p-quantity="1">
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
                                                data-p-id="{{ $rP->id }}" data-p-quantity="1">
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
        .qty-num-input input::-webkit-outer-spin-button,
        .qty-num-input input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .qty-num-input input[type=number] {
            -moz-appearance: textfield;
        }

        .qty-num-input .input-group-text {
            display: flex;
            align-items: center;
            padding: 0rem 0rem;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            white-space: nowrap;
            background-color: transparent;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

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

        .min-h-2-80 {
            height: 80px;
            width: 80px;
        }
    </style>
@endsection



@section('js')
    <script>
        $('button.add-to-wish-showpage').click(function() {
            if ($(this).attr("data-p-id")) {
                // console.log(this);
                var btn = $(this);
                axios.post('{{ route('frontend.p.addToWishlist') }}', {
                        product_id: $(this).attr("data-p-id")
                    })
                    .then(function(res) {
                        if (res.data.status) {


                            if (res.data.addToWishlist) {
                                btn[0].classList.add('active');
                                if (btn.find(".tool-tip-text-showpage").length) {
                                    btn.find(".tool-tip-text-showpage")[0].innerHTML = "Wishlisted";
                                    var svg =
                                        '<svg width="15" height="15" viewBox="0 0 15 15" fill="#EC268F" xmlns="http://www.w3.org/2000/svg"><path d="M12.8601 1.28593C11.0128 -0.142086 8.73172 0.524319 7.50019 2.1586C6.26867 0.524319 3.98754 -0.15002 2.14025 1.28593C1.16063 2.04753 0.544866 3.33274 0.502883 4.68935C0.40492 7.76751 2.812 10.2348 6.48558 14.019L6.55555 14.0904C7.08735 14.6378 7.90604 14.6378 8.43783 14.0825L8.5148 14.0032C12.1884 10.2269 14.5885 7.75958 14.4975 4.68142C14.4555 3.33274 13.8398 2.04753 12.8601 1.28593ZM7.57017 12.837L7.50019 12.9163L7.43022 12.837C10.649 10.5 9.5 8.29275 9.5 6C9.5 4.41332 7.03837 7 8.43783 7C9.51542 7 6.47858 2.87261 6.84944 3.95948H8.15794C8.5218 2.87261 8.92242 4.5 10 4.5C11 3 6 2.3728 6 3.95948C6 6.25223 6 11 7.57017 12.837Z" fill="#EC268F"/></svg>';
                                    btn.find("svg").replaceWith(svg);
                                }


                            } else {
                                btn[0].classList.remove('active');
                                if (btn.find(".tool-tip-text-showpage").length) {
                                    btn.find(".tool-tip-text-showpage")[0].innerHTML = "Wishlist";
                                    var svg =
                                        '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.3601 0.785926C10.5128 -0.642086 8.23172 0.0243193 7.00019 1.6586C5.76867 0.0243193 3.48754 -0.65002 1.64025 0.785926C0.66063 1.54753 0.0448664 2.83274 0.00288252 4.18935C-0.0950798 7.26751 2.312 9.7348 5.98558 13.519L6.05556 13.5904C6.58735 14.1378 7.40604 14.1378 7.93783 13.5825L8.0148 13.5032C11.6884 9.72687 14.0885 7.25958 13.9975 4.18142C13.9555 2.83274 13.3398 1.54753 12.3601 0.785926ZM7.07017 12.337L7.00019 12.4163L6.93022 12.337C3.5995 8.91766 1.40234 6.65664 1.40234 4.36389C1.40234 2.77721 2.45194 1.5872 3.8514 1.5872C4.92899 1.5872 5.97858 2.37261 6.34944 3.45948H7.65794C8.0218 2.37261 9.0714 1.5872 10.149 1.5872C11.5484 1.5872 12.598 2.77721 12.598 4.36389C12.598 6.65664 10.4009 8.91766 7.07017 12.337Z" fill="#EC268F"/></svg>';
                                    btn.find("svg").replaceWith(svg);
                                }

                            }

                            Snackbar.show({
                                text: res.data.message,
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#1abc9c'
                            });
                        } else {
                            Snackbar.show({
                                text: res.data.message ?? 'Something Went Wrong',
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#2196f3'
                            });
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                        Snackbar.show({
                            text: "Something Went Wrong",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    });
            }
        });
    </script>

@endsection
