@extends('frontend.layouts.app')
@section('title', 'Search ' . ucfirst($search) . ' |')

@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection

@section('content')

    <section>
        <div class="container mb-5">
            <div class="row mt-0 mt-lg-5">
                <div class="col-lg-5 col-xl-4 col-xxl-4">
                    <h2 class="main-head text-red">Search: {{ $search }}</h2>
                </div>
                <div class="col-lg-7 col-xl-4 col-xxl-5">
                    <div class="d-flex gap-4 justify-content-between flex-column flex-sm-row my-4 my-lg-0">


                        {{-- <div class="d-flex gap-3 align-items-baseline">
                            <div>For</div>
                            <div class="pro-radio-btn">
                                <input type="radio" class="btn-check" name="options" id="option01" autocomplete="off">
                                <label class="btn" for="option01">Him</label>
                            </div>
                            <div class="pro-radio-btn">
                                <input type="radio" class="btn-check" name="options" id="option02" autocomplete="off">
                                <label class="btn" for="option02">Her</label>
                            </div>

                        </div> --}}

                    </div>
                </div>
                <div class="col-lg-12 col-xl-4 col-xxl-3">
                    <form action="{{ route('frontend.search.index') }}" method="GET">
                        <input type="hidden" value="{{ $search }}" name="q">
                        {{-- <div class="d-flex justify-content-end align-items-baseline gap-3 gap-xl-4 gap-xxl-3">
                            <div>Items per page</div>
                            <div style="width: 100px">
                                <select class="form-select form-select-lg mb-3 top-product-des"
                                    aria-label=".form-select-lg example" style="font-size: 16px" name="limit">
                                    <option selected class="top-product-text">10</option>
                                    <option value="1" class="top-product-text">20</option>
                                    <option value="2" class="top-product-text">30</option>
                                    <option value="3" class="top-product-text">40</option>
                                </select>
                            </div>
                        </div> --}}


                        <div class="d-flex justify-content-end align-items-baseline gap-3 gap-xl-4 gap-xxl-3">
                            <div>Sort By</div>
                            <div>
                                <select class="form-select form-select-lg mb-3 top-product-des"
                                    aria-label=".form-select-lg example" style="font-size: 16px"
                                    onchange="this.form.submit()" name="sort_by">
                                    <option value="new_arrival"
                                        {{ request('sort_by') && request('sort_by') == 'new_arrival' ? 'selected' : '' }}
                                        class="top-product-text">Newest Arrivals</option>
                                    <option class="top-product-text" value="featured"
                                        {{ request('sort_by') && request('sort_by') == 'featured' ? 'selected' : '' }}>
                                        Featured
                                    </option>
                                    <option value="low_to_high"
                                        {{ request('sort_by') && request('sort_by') == 'low_to_high' ? 'selected' : '' }}
                                        class="top-product-text">Price: Low to High</option>
                                    <option value="high_to_low"
                                        {{ request('sort_by') && request('sort_by') == 'high_to_low' ? 'selected' : '' }}
                                        class="top-product-text">Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($errors->has('q'))
                    <div class="text-danger" role="alert">{{ $errors->first('q') }}
                    </div>
                @endif

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="tab-content">

                        <div id="__skincare">
                            @if ($products->count())
                                <div class="product-show-grid">

                                    @forelse ($products as $pro)
                                        <div class=" product-show-grid-card ">
                                            <div class="product-card-img">
                                                @if (in_array($pro->id, $wishlist))
                                                    <button class="btn wishlist add-to-wish active"
                                                        data-p-id="{{ $pro->id }}">
                                                        <span class="has-tool-tip">
                                                            <i class="fa-regular fa-heart"></i>
                                                            <span class="tool-tip-text">Remove From Wishlist</span>
                                                        </span>
                                                    </button>
                                                @else
                                                    <button class="btn wishlist add-to-wish"
                                                        data-p-id="{{ $pro->id }}">
                                                        <span class="has-tool-tip">
                                                            <i class="fa-regular fa-heart"></i>
                                                            <span class="tool-tip-text">Add to Wishlist</span>
                                                        </span>
                                                    </button>
                                                @endif
                                                <a href="{{ route('frontend.p.show', $pro->slug) }}">
                                                    <img src="{{ asset('storage/images/products/thumbnails/' . $pro->thumbnail_image) }}"
                                                        alt="...">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title font-head fw-bold" title="{{ $pro->name }}">
                                                    <a href="{{ route('frontend.p.show', $pro->slug) }}">
                                                        {{ str_limit($pro->name, 50) }}
                                                    </a>
                                                </h4>
                                                {{-- <small class="text-muted">
                                                    {{ $pro->short_descriptions }}
                                                </small> --}}
                                                <div class="price">
                                                    ₹{{ $pro->final_price }} <s
                                                        class="text-danger">₹{{ $pro->mrp }}</s>
                                                </div>
                                                <div class="buttons">
                                                    <a href="{{ route('frontend.p.show', $pro->slug) }}"
                                                        class="btn btn-orange">
                                                        Shop now
                                                    </a>
                                                    @if (in_array($pro->id, $productInCart))
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-pink add-to-cart btn-outline-pink"
                                                            data-p-id="{{ $pro->id }}" data-p-quantity="1">
                                                            <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                                focusable="false" data-prefix="fas" data-icon="check"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                                                </path>
                                                            </svg> Added
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0)" class="btn btn-pink add-to-cart"
                                                            data-p-id="{{ $pro->id }}" data-p-quantity="1">
                                                            Add To Cart
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            @else
                                <div class="text-center my-5">
                                    <p>No Products Found</p>
                                </div>
                            @endif
                            <div class="d-flex justify-content-center mt-4">
                                {{ $products->onEachSide(1)->withQueryString()->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('form select').on('change', function() {
            $(this).closest('form').submit();
        });
    </script>
@endsection
