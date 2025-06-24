@extends('frontend.layouts.app')
@section('title', 'Order |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    @include('components.frontend.profile-nav-div')

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.profile') }}"
                            class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Orders</li>
                </ol>
            </nav>
        </div>
    </section>
    <section style="padding:0px 0px 50px 0px">
        <div class="container">
            @forelse($orders as $order)
                <div class="row py-4">
                    <div class="d-flex justify-content-center my-order-main">
                        <div class="col-sm-10  my-order-main-out">
                            <div class="row  my-order-main-in">
                                <div
                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column my-order-main-in-img">
                                    <img src="{{ asset('storage/images/products/thumbnails/' . $order->items->first()->product->thumbnail_image) }}"
                                        class="img-fluid order-prod-thumb-img" alt="">
                                </div>
                                <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6  my-order-main-desc">

                                    <h5 class="main-head">{{ $order->items->first()->product->name }}@if ($order->items->count() > 1)
                                            {{ ' & more' }}
                                        @endif
                                    </h5>
                                    <ul class="list-unstyled d-flex gap-2 flex-column">
                                        <li class="price">Total Amount: ₹ {{ $order->total_amount }}</li>
                                        <li class="status">
                                            <ul
                                                class="gap-2 d-flex flex-row flex-lg-column flex-xl-column  gap-lg-2 justify-content-between p-0">
                                                {{-- @if ($order->status == 'completed' && !$order->deliveries->count())
                                                    <li class="cancel-order text-red list-unstyled">
                                                        <a href="{{ route('frontend.order.cancel', $order->id) }}"
                                                            class="text-red">
                                                            Cancel Order
                                                        </a>
                                                    </li>
                                                @endif --}}
                                                @if ($order->status == 'completed')
                                                    @php
                                                        $delivery = $order->deliveries->first();
                                                    @endphp
                                                    @if ($delivery && $delivery->status == 'Delivered' && $delivery->delivered_date)
                                                        <li class="cancel-order text-red list-unstyled">
                                                            <a href="javascript:void(0)" class="text-red">
                                                                Delivered On:
                                                                {{ dd_format($order->deliveries->where('status', 'Delivered')->first()->delivered_date, 'd M Y') }}
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="cancel-order text-red list-unstyled">
                                                            <a href="javascript:void(0)" class="text-red">
                                                                Delivery: {{ $delivery ? $delivery->status : 'Pending' }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>

                                </div>
                                <div
                                    class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0  my-order-main-in-btn gap-2">
                                    {{-- <a href="http://" class="arriving-or-btn">Arriving Wednesday</a> --}}
                                    <button type="button" class="btn  add-orderDetails-btn">
                                        <a href="{{ route('frontend.order.show', $order->order_no) }}">
                                            Order Details
                                        </a>
                                    </button>
                                    {{-- <button type="submit" class="btn  add-track-btn">
                                        <a href="http://">
                                            Track Order
                                        </a>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <section class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="d-flex flex-column align-items-center not-found">
                                        <img src="frontend/images/not-found/not-fond.png" alt="" class="img-fluid"
                                            style="width:400px">
                                        <div class="not-found-desc">Looks like you haven't placed an order</div>
                                        <a href="/" class="btn btn-orange or-secondpage-lbtn mt-4 ">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforelse

            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $orders->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>
        </section>


    @endsection
