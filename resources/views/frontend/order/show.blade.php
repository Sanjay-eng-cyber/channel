@extends('frontend.layouts.app')
@section('title', 'Order Details |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.profile') }}"
                            class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('frontend.order.index') }}"
                            class="bread-crum breadcrumb-hover">My Orders</a></li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-2">
                    <div class="">
                        <h3 class="h5 font-body">
                            Items
                        </h3>
                        <hr>
                        <div class="row my-3">
                            @foreach ($order->items()->with('product')->get() as $item)
                                <div class="col-12 d-flex">
                                    <a href="{{ route('frontend.p.show', $item->product->slug) }}" target="_blank">
                                        <img src="{{ asset('storage/images/products/thumbnails/' . $item->product->thumbnail_image) }}"
                                            alt="..."
                                            class="my-2 rounded-2 border border-1 pink-border me-3 cart-p-img">
                                    </a>
                                    <div class="mt-1">
                                        <a href="{{ route('frontend.p.show', $item->product->slug) }}" target="_blank">
                                            <p class="mb-1 text-black">{{ $item->product->name }}</p>
                                        </a>
                                        <span>Price: ₹{{ $item->amount }}</span><br>
                                        <span>Qty: {{ $item->quantity }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-6 mb-1">
                    <div class="py-1">
                        <h3 class="h5 font-body">
                            Delivery Address
                        </h3>
                        <div class="my-2">
                            <div class="col-12 border-1 border rounded-1 pink-border">
                                <label class="w-100 p-2">
                                    <h6 class="h6 font-body text-capitalize">
                                        {{ $order->address_name }}
                                    </h6>
                                    <p class="tex-capitalize">
                                        {{ $order->street_address . ', ' . $order->landmark }}
                                        <br>
                                        {{ $order->city . ', ' . $order->state }}
                                        <br>
                                        {{ $order->country . ' ' . $order->postal_code }}
                                    </p>
                                </label>
                                {{-- @if ($delivery && $delivery->status == 'Delivered' && $delivery->delivered_date)
                                    <label for="" class="w100 p-2">
                                        <h6 class="h6 font-body">Delivered On:
                                            {{ dd_format($delivery->delivered_date, 'd M Y h:i a') }}
                                        </h6>
                                    </label>
                                @else
                                    <label for="" class="w100 p-2">
                                        <h6 class="h6 font-body text-capitalize">Delivery:
                                            {{ $delivery->status }}
                                        </h6>
                                    </label>
                                @endif --}}
                            </div>
                        </div>
                    </div>

                    <hr>
                    <span class="h6 font-body">Order Placed On: {{ dd_format($order->created_at, 'd M Y h:i a') }}
                    </span>
                    @if ($delivery && $delivery->status == 'Delivered' && $delivery->delivered_date)
                        <br>
                        <span class="h6 font-body">Delivered On:
                            {{ dd_format($delivery->delivered_date, 'd M Y h:i a') }}</span>
                    @else
                        <br>
                        <span class="h6 font-body">Delivery:
                            {{ $delivery ? $delivery->status : 'Pending' }}</span>
                    @endif
                    <hr>
                    <span class="h5  font-body text-capitalize">Price Details
                    </span>

                    <div class="d-flex justify-content-between align-items-center text-muted my-1">
                        <span>
                            Sub-Total:
                        </span>
                        <span>
                            ₹{{ $order->sub_total }}
                        </span>
                    </div>
                    @if ($order->discount_amount)
                        <div class="d-flex justify-content-between align-items-center text-muted my-1">
                            <span>
                                Coupon Discount:
                            </span>
                            <span>
                                ₹{{ $order->discount_amount }}
                            </span>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center text-muted my-1">
                        <span>
                            GST:
                        </span>
                        <span>
                            ₹{{ $gst['total'] }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center text-muted my-1">
                        <span class="text-black">
                            Total MRP:
                        </span>
                        <span class="text-black">
                            ₹{{ $order->total_amount }}
                        </span>
                    </div>
                    {{-- <div class="d-flex justify-content-between align-items-center text-muted my-3">
                        <strong class="text-black">
                            Order Total:
                        </strong>
                        <span class="text-black">
                            ₹{{ $grandTotal }}
                        </span>
                    </div> --}}

                    <hr class="my-1">
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

@endsection
