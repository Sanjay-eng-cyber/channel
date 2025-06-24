@extends('frontend.layouts.app')
@section('title', 'Payment |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <section class="my-5">
        <div class="container">
            {{-- <form action="{{ route('frontend.p.payment', $products->first()->slug) }}" method="POST"> --}}
            {{-- @csrf --}}
            <div class="row">
                <div class="col-lg-6 mb-2">
                    <div class="step-process my-3">
                        <span class="step completed">
                            <span class="number">
                                <i class="fas fa-check "></i>
                            </span>
                            <small class="text">
                                Log In Details
                            </small>
                        </span>
                        <span class="step completed">
                            <span class="number">
                                <i class="fas fa-check "></i>
                            </span>
                            <small class="text">
                                Delivery Address
                            </small>
                        </span>
                        <span class="step active">
                            <span class="number">
                                3
                            </span>
                            <small class="text">
                                Payment
                            </small>
                        </span>
                    </div>

                    <div class="py-3">
                        <h3 class="h5 font-body">
                            Items
                        </h3>
                        <hr>
                        <div class="row my-3">
                            @foreach ($cartItems as $cartItem)
                                <div class="col-12 d-flex">
                                    {{-- <img src="https://via.placeholder.com/100"
                                        class="w-auto my-2 rounded-2 border border-1 pink-border me-3" height="100px"
                                        width="100px" alt=""> --}}
                                    <img src="{{ asset('storage/images/products/thumbnails/' . $cartItem->product->thumbnail_image) }}"
                                        alt="..." class="my-2 rounded-2 border border-1 pink-border me-3 cart-p-img">
                                    <div class="mt-1">
                                        <p class="mb-1 text-black">{{ $cartItem->product->name }}</p>
                                        <span>Price: ₹{{ $cartItem->product->final_price }}</span><br>
                                        <span>Qty: {{ $cartItem->quantity }}</span>
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
                                <label for="user-address-{{ $selectedAddress->id }}" class="w-100 p-2">
                                    {{-- <div class="address-header">
                                        <span class="name">
                                            {{ ucfirst($selectedAddress->type) }}
                                        </span>
                                    </div> --}}
                                    <h6 class="h6 font-body text-capitalize">
                                        {{ $selectedAddress->name }}
                                    </h6>
                                    <p class="tex-capitalize">
                                        {{ $selectedAddress->street_address . ', ' . $selectedAddress->landmark }}
                                        <br>
                                        {{ $selectedAddress->city . ', ' . $selectedAddress->state }}
                                        <br>
                                        {{ $selectedAddress->country . ', ' . $selectedAddress->postal_code }}
                                    </p>
                                </label>
                            </div>
                        </div>
                    </div>

                    @if (session()->has('coupon'))
                        <div class="my-2">
                            <label for="coupon-code-input my-3">Applied Coupon</label>
                            <div class="input-group my-2">
                                @csrf
                                <input type="text" class="form-control" placeholder="Enter Coupon Code"
                                    style="max-width: 221px;" name="coupon"
                                    value="{{ session()->has('coupon') ? session('coupon')->code : null }}" disabled>
                                {{-- <button type="submit" class="btn btn-outline-pink-hover p-1 p-xl-2 text-end ml-2">
                                    Apply Coupon
                                </button> --}}
                            </div>
                            {{-- <a href="{{ route('frontend.remove-coupon') }}">Remove Coupon</a> --}}
                        </div>
                        <hr>
                    @endif

                    {{-- <hr> --}}
                    <span class="h5  font-body text-capitalize">Price Details
                    </span>

                    <div class="d-flex justify-content-between align-items-center text-muted my-1">
                        <span>
                            Sub-Total:
                        </span>
                        <span>
                            ₹{{ $subTotal }}
                        </span>
                    </div>
                    @if (session()->has('discount'))
                        <div class="d-flex justify-content-between align-items-center text-muted my-1">
                            <span>
                                Coupon Discount:
                            </span>
                            <span>
                                ₹{{ $discount }}
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
                        <span>
                            Total MRP:
                        </span>
                        <span>
                            ₹{{ $grandTotal }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center text-muted my-3">
                        <strong class="text-black">
                            Order Total:
                        </strong>
                        <span class="text-black">
                            ₹{{ $grandTotal }}
                        </span>
                    </div>

                    <hr class="my-1">

                    <div class="d-flex justify-content-center justify-content-md-end text-muted my-3">
                        <button type="button" id="rzp-button1" onclick="openRazorpay(this)"
                            class="btn btn-outline-pink-hover p-1 p-xl-2 text-end">
                            Pay Now
                        </button>
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </section>

@endsection

@section('js')
    <script src="//checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ config('razorpay.id') }}", // Enter the Key ID generated from the Dashboard
            "amount": {{ (int) $grandTotal * 100 }}, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise "currency": "INR",
            "name": "{{ config('app.name') }}",
            "description": "{{ config('app.env') }}",
            "image": "https://example.com/your_logo",
            "order_id": "{{ $order['api_order_id'] }}",
            "callback_url": "{{ route('razorpay.callback') }}",
            "prefill": {
                "name": "User",
                "email": "user@gmail.com",
                "contact": "1234567890"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);

        function openRazorpay(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
@endsection
