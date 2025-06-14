@extends('frontend.layouts.app')
@section('title', 'Checkout |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <section class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 mb-4">

                    <div class="step-process my-3">
                        <span class="step completed ">
                            <span class="number">
                                <i class="fas fa-check "></i>
                            </span>
                            <small class="text">
                                Log In Details
                            </small>
                        </span>
                        <span class="step active">
                            <span class="number">
                                2
                            </span>
                            <small class="text">
                                Delivery Address
                            </small>
                        </span>
                        <span class="step">
                            <span class="number">
                                3
                            </span>
                            <small class="text">
                                Payment
                            </small>
                        </span>
                    </div>

                    <form action="{{ route('frontend.cart.payment') }}" method="POST" id="checkout_form">
                        @csrf
                        <div class="border-1 border rounded-1 gray-border p-3">
                            <h3 class="h5 font-body">
                                Select A Delivery Address
                            </h3>
                            <div class="row my-3">

                                @forelse ($userAddresses as $address)
                                    <div class="col-12 user-address-box-holder">
                                        <input type="radio" name="address" value="{{ $address->id }}"
                                            id="user-address-{{ $address->id }}" class="d-none">
                                        <label for="user-address-{{ $address->id }}"
                                            class="user-address-box w-100 p-2 cur-pointer">
                                            <div class="address-header">
                                                <span class="name">
                                                    {{ ucfirst($address->type) }}
                                                </span>
                                            </div>
                                            <h6 class="h6 font-body text-capitalize">
                                                {{ $address->name }}
                                            </h6>
                                            <p class="tex-capitalize">
                                                {{ $address->street_address . ', ' . $address->landmark }}
                                                <br>
                                                {{ $address->city . ', ' . $address->state }}
                                                <br>
                                                {{ $address->country . ', ' . $address->postal_code }}
                                            </p>
                                        </label>
                                    </div>
                                @empty
                                @endforelse

                            </div>
                            <button class="btn btn-pink" data-bs-toggle="modal" type="button"
                                data-bs-target="#addressFormPopup">
                                +Add Address
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-lg-6 mb-4">

                    <span class="h5 font-body text-capitalize">
                        Items
                    </span>

                    <div class="row">

                        @foreach ($cartItems as $cartItem)
                            <div class="col-12 d-flex">
                                <img src="{{ asset('storage/images/products/' . $cartItem->product->thumbnail_image) }}"
                                    alt="..." class="my-2 rounded-2 border border-1 pink-border me-3 cart-p-img">
                                <div class="mt-1">
                                    <p class="mb-1 text-black">{{ $cartItem->product->name }}</p>
                                    <span>Price: ₹{{ $cartItem->product->final_price }}</span><br>
                                    <span>Qty: {{ $cartItem->quantity }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="my-2">
                        @if (session()->has('coupon'))
                            <label for="coupon-code-input my-3">Applied Coupon</label>
                            <div class="input-group my-2">
                                <input type="text" class="form-control" placeholder="Enter Coupon Code"
                                    style="max-width: 221px;" name="coupon"
                                    value="{{ session()->has('coupon') ? session('coupon') : null }}" disabled>
                                <a href="{{ route('frontend.remove-coupon') }}">
                                    <button type="button" class="btn btn-outline-pink-hover h-100 p-1 p-xl-2 text-end ml-2">
                                        Remove Coupon
                                    </button>
                                </a>
                            </div>
                        @else
                            <label for="coupon-code-input my-3">Coupon</label>
                            <form action="{{ route('frontend.apply-coupon') }}" method="POST" id="couponForm">
                                @csrf
                                <div class="input-group my-2">
                                    <input type="text" class="form-control" placeholder="Enter Coupon Code"
                                        style="max-width: 221px;" name="coupon"
                                        value="{{ session()->has('coupon') ? session('coupon') : null }}" required>
                                    <button type="submit" class="btn btn-outline-pink-hover h-100 p-1 p-xl-2 text-end ml-2">
                                        Apply Coupon
                                    </button>
                                </div>
                            </form>
                        @endif
                        @if ($errors->has('coupon'))
                            <div id="name-error" class="text-danger text-start">
                                {{ $errors->first('coupon') }}</div>
                        @endif
                    </div>
                    <hr>

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
                    @if (session()->has('coupon'))
                        <div class="d-flex justify-content-between align-items-center text-muted my-1">
                            <span>
                                Discount:
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

                    <div class="d-flex justify-content-center justify-content-md-end text-muted my-3">
                        <button type="submit" form="checkout_form" class="btn btn-outline-pink-hover p-1 p-xl-2 text-end">
                            Proceed To Payment
                        </button>
                    </div>
                    <hr class="my-1">
                </div>
            </div>

        </div>

        <!-- address form popup Modal -->
        <div class="modal fade auth-popup" id="addressFormPopup" tabindex="-1" aria-labelledby="addressFormPopupLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-body">
                        <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                            aria-label="Close">
                            <img src="{{ url('frontend/images/icons/icon-close.svg') }}" style="width: 51px;"
                                alt="">
                        </button>

                        {{-- if otp not send --}}
                        <div class="auth-popup-body">
                            <form class="row" action="{{ route('frontend.address.update') }}" method="post">
                                @csrf
                                <h5 class="main-head text-red">Add Address</h5>

                                <div class="form-group py-2 req-input">
                                    <input type="text" name="name" class=" profile-form-input-custome "
                                        placeholder="Name" required minlength="3" maxlength="20" required>
                                    @if ($errors->has('name'))
                                        <div id="name-error" class="text-danger text-start">
                                            {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group py-2 req-input-2">
                                    <input type="text" name="street_address" class=" profile-form-input-custome"
                                        placeholder="Street Address" required minlength="5" maxlength="80" required>
                                    @if ($errors->has('street_address'))
                                        <div id="street_address-error" class="text-danger text-start">
                                            {{ $errors->first('street_address') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2 col-md-6">
                                    <input type="text" name="city" class=" profile-form-input-custome"
                                        placeholder="City" minlength="3" maxlength="20" required>
                                    @if ($errors->has('city'))
                                        <div id="city-error" class="text-danger text-start">{{ $errors->first('city') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group py-2 col-md-6">
                                    <input type="text" name="state" class=" profile-form-input-custome"
                                        placeholder="State" minlength="3" maxlength="50" required>
                                    @if ($errors->has('state'))
                                        <div id="state-error" class="text-danger text-start">
                                            {{ $errors->first('state') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2 col-md-6">
                                    <input type="text" name="country" class=" profile-form-input-custome"
                                        placeholder="Country" minlength="3" maxlength="50" required>
                                    @if ($errors->has('country'))
                                        <div id="country-error" class="text-danger text-start">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group py-2 col-md-6">
                                    <input type="text" name="postal_code" class="profile-form-input-custome col-md-6"
                                        placeholder="Pin Code" minlength="3" maxlength="20" required>
                                    @if ($errors->has('postal_code'))
                                        <div id="postal_code-error" class="text-danger text-start">
                                            {{ $errors->first('postal_code') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-12 pt-4">
                                    <button type="submit" class="btn profile-btn-color">Save Address</button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        // @if (count($errors) > 0)
        //     $(document).ready(function() {
        //         $('#addressFormPopup').modal('show')
        //     });
        // @endif
        $("#checkout_form").submit(function(e) {
            e.preventDefault();
            // check any address is selected or not
            var address_id = $('input[name=address]:checked').val();
            console.log(address_id);
            if (address_id == undefined) {
                Snackbar.show({
                    text: "Please select delivery address",
                    pos: 'top-right',
                    actionTextColor: '#fff',
                    backgroundColor: '#2196f3'
                });
                return false;
            }
            this.submit();
        });
    </script>
@endsection
