@extends('frontend.layouts.app')
@section('title', 'Payment Process |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">

    <style>
        html,
        body {
            overflow-x: hidden;

        }
    </style>
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Payment Process</li>
                </ol>
            </nav>
        </div>
    </section>
    <section style="padding:0px 0px 50px 0px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7" style="text-align: -webkit-center;">
                    <div class="row">
                        <div class="col ">
                            <div class="progress-steps ">
                                <button class="showSingle" target="1" role="tab" tabindex="0"
                                    aria-controls="nils-tab" aria-label="Step 1"></button>
                                <button class="showSingle" target="2" role="tab" tabindex="0"
                                    aria-controls="nils-tab" aria-label="Step 2"></button>
                                <button class="showSingle" target="3" role="tab" tabindex="0"
                                    aria-controls="nils-tab" aria-label="Step 3"></button>

                            </div>
                            <div class="progress-steps d-flex justify-content-evenly  text-center ">
                                <p class="">Log In Details</p>
                                <p class="mx-xl-5 mx-md-3 mx-sm-3">Delivery Address</p>
                                <p>Payment Method</p>
                            </div>
                        </div>
                    </div>


                    <section id="progress-content" class="hide ">
                        <div id="div1" class="targetDiv profile-form-border col-10 pt-md-3 p-2 mx-0 ">
                            <h4 class="main-head">Select A Delivery Address</h4>

                            <div class="col-lg-8 mt-3">


                                <div class="profile-form-border p-4 mb-3">
                                    <div class="row text-md-start">

                                        <div class=" py-2 ">
                                            <ul class="d-flex gap-5 list-unstyled justify-content-start">

                                                <li>
                                                    <button type="button"
                                                        class="btn btn-primary position-relative profile-s-bg-color">Home

                                                        <span
                                                            class="position-absolute top-0 start-100 translate-middle  bg-success border border-light rounded-circle profile-alert-icon">
                                                            <i class="fas fa-check text-white"></i>
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </button>
                                                </li>


                                                <li>
                                                    <a
                                                        href="'frontend.address.delete' data-bs-toggle='modal' data-bs-target='#trashbtn'">
                                                        <i class="far fa-trash-alt fa-1x profile-trash-icon"></i>
                                                    </a>
                                                </li>

                                            </ul>

                                        </div>

                                        <h5>Nishchay luthra</h5>
                                        <p>Rajat tower, near Jaswant inox, Kamptee Rd, Near Indora Chowk, Nagpur,
                                            Maharashtra 440017</p>
                                        <a href="" class="text-red h6 text-decoration-underline">Deliver To This
                                            Address</a>
                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-12 pt-4">
                                <button type="submit" class="btn profile-btn-color">+ Add Address</button>
                            </div>
                        </div>


                        <div id="div2" class="targetDiv">

                            <div class="col-lg-8">
                                <div class="p-4 profile-form-border " style="position: relative;">
                                    <form class="" action="{{ route('frontend.address.update') }}" method="post">
                                        @csrf
                                        <h5 class="main-head text-red">Enter Your Address</h5>

                                        <div class="form-group py-2 req-input">
                                            <input type="text" name="name" class=" profile-form-input-custome "
                                                placeholder="Name" required minlength="3" maxlength="20" required>
                                            @if ($errors->has('name'))
                                                <div id="name-error" class="text-primary">
                                                    {{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group py-2 req-input-2">
                                            <input type="text" name="street_address" class=" profile-form-input-custome"
                                                placeholder="Street Address" required minlength="5" maxlength="80"
                                                required>
                                            @if ($errors->has('street_address'))
                                                <div id="street_address-error" class="text-primary">
                                                    {{ $errors->first('street_address') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group py-2">
                                            <input type="text" name="city" class=" profile-form-input-custome"
                                                placeholder="City" minlength="3" maxlength="20" required>
                                            @if ($errors->has('city'))
                                                <div id="city-error" class="text-primary">{{ $errors->first('city') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group py-2">
                                            <input type="text" name="state" class=" profile-form-input-custome"
                                                placeholder="State" minlength="3" maxlength="50" required>
                                            @if ($errors->has('state'))
                                                <div id="state-error" class="text-primary">{{ $errors->first('state') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group py-2">
                                            <input type="text" name="country" class=" profile-form-input-custome"
                                                placeholder="Country" minlength="3" maxlength="50" required>
                                            @if ($errors->has('country'))
                                                <div id="country-error" class="text-primary">
                                                    {{ $errors->first('country') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group  profile-form-group-star-pin-code py-2">
                                            <input type="text" name="postal_code" class="profile-form-input-custome"
                                                placeholder="Pin Code" minlength="3" maxlength="20" required>
                                            @if ($errors->has('postal_code'))
                                                <div id="postal_code-error" class="text-primary">
                                                    {{ $errors->first('postal_code') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group   py-2">

                                            <div class="row">
                                                <div class="col-6 pt-2">
                                                    <label for="" class="form-check-label gray-new">Address
                                                        Type</label>
                                                </div>
                                                <div class="col-6 dropdown-add">
                                                    <select name="" id=""
                                                        class="profile-form-input-custome gray-new"
                                                        placeholder="Address Type">
                                                        <option value="">Select</option>
                                                        <option value="">Home</option>
                                                        <option value="">Office</option>

                                                        <option value="">Other</option>
                                                    </select>
                                                </div>
                                            </div>



                                        </div>

                                        {{-- <div class="row">
            <div class="col-sm-6 py-2">

                <label for="" class="profile-f-l-color"> Address Type</label>

            </div>
            <div class="col-sm-6 py-2 profile-form-label-color">
                <select class="form-select-lg mb-3 profile-form-input-custome profile-f-l-color"
                    aria-label=".form-select-lg example">
                    <option selected class="profile-f-l-color border-0">Home</option>
                    <option value="1" class="profile-f-l-color">Office</option>
                    <option value="2" class="profile-f-l-color">Other</option>
                </select>
            </div>
        </div> --}}


                                        <div class="col-sm-12 pt-4">
                                            <button type="submit" class="btn profile-btn-color">Save Address</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="div3" class="targetDiv ">

                            <div class="col-lg-10 ">


                                <div class="profile-form-border p-4 mb-3">
                                    <div class="row">
                                        <h3 class="main-head">Credit Card\Debit Card</h3>
                                        <div class="col-md-8 mt-3">
                                            <div class="frm-group">
                                                <input type="text" class="form-control" placeholder="Name On Card">
                                            </div>
                                            <div class="frm-group mt-3">
                                                <input type="text" class="form-control" placeholder="Card Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <input type="text" class="form-control " placeholder="CVV">
                                            <div class="p-relative">
                                                <span class="card-cvv text-cvv"><i
                                                        class="fa fa-credit-card-alt "></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <input type="text" class="form-control" placeholder="Expiry MM">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <input type="text" class="form-control" placeholder="Expiry YY">
                                        </div>
                                        <div class="d-flex">
                                            <input type="checkbox" class="d-block mt-3"> &nbsp;<small
                                                class="text-muted d-block mt-3"> Save Card For Future Use</small>
                                        </div>
                                        <div class="col-sm-12 pt-4">
                                            <button type="submit" class="btn profile-btn-color">Pay <i
                                                    class="fa fa-inr"></i>145.55</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="profile-form-border p-4 mb-3">
                                    <div class="row">
                                        <h3 class="main-head">Net Banking</h3>
                                        <div class="col-md-8 mt-3">
                                            <div class="row justify-content-md-around">
                                                <div class="col-md-2 col-4 ">
                                                    <img src="{{ url('frontend/images/banks/axis.png') }}" alt=""
                                                        class="w-60">
                                                </div>
                                                <div class="col-md-2 col-4">
                                                    <img src="{{ url('frontend/images/banks/hdfc.png') }}" alt=""
                                                        class="w-60">
                                                </div>
                                                <div class="col-md-2 col-4">
                                                    <img src="{{ url('frontend/images/banks/icici.png') }}"
                                                        alt="" class="w-60">
                                                </div>
                                                <div class="col-md-2 col-4 mt-md-0 mt-3">
                                                    <img src="{{ url('frontend/images/banks/sbi.png') }}" alt=""
                                                        class="w-60">
                                                </div>
                                                <div class="col-md-2 col-4 mt-md-0 mt-3">
                                                    <img src="{{ url('frontend/images/banks/kotak.png') }}"
                                                        alt="" class="w-60">
                                                </div>





                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 mt-3">
                                            <select name="" id="" class="form-control"
                                                placeholder="Select Bank">
                                                <option value="">Select Bank</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>


                                <div class="profile-form-border p-4 mb-3">
                                    <div class="row">
                                        <h3 class="main-head">Wallets</h3>
                                        <div class="col-md-9 mt-3">
                                            <div class="d-flex profile-form-border p-2">
                                                <input type="radio" name="wallets" class="form-check-radio"> <img
                                                    src="{{ url('frontend/images/banks/paytm.png') }}" alt=""
                                                    class="mx-3 w-40"> <span>Paytm Wallet</span>
                                            </div>
                                        </div>

                                        <div class="col-md-9 mt-3">
                                            <div class="d-flex profile-form-border p-1">
                                                <input type="radio" name="wallets" class="form-check-radio"> <img
                                                    src="{{ url('frontend/images/banks/ola.png') }}" alt=""
                                                    class="mx-md-3 w-40"> <span class="mt-1">Ola Money Postpaid-Wallets
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-9 mt-3">
                                            <div class="d-flex profile-form-border p-1">
                                                <input type="radio" name="wallets" class="form-check-radio"> <img
                                                    src="{{ url('frontend/images/banks/mobi.png') }}" alt=""
                                                    class="mx-3 w-40"> <span class="mt-1">Mobikwik</span>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="profile-form-border p-4 mb-3">
                                    <div class="row">
                                        <h3 class="main-head">UPI</h3>
                                        <div class="col-md-9 mt-3">
                                            <div class="d-flex profile-form-border p-2">
                                                <input type="radio" name="wallets" class="form-check-radio"> <img
                                                    src="{{ url('frontend/images/banks/upi.png') }}" alt=""
                                                    class="mx-3 w-40"> <span>UPI</span>
                                            </div>
                                        </div>

                                        <div class="col-md-9 mt-3">
                                            <div class="d-flex profile-form-border p-2">
                                                <input type="radio" name="wallets" class="form-check-radio"> <img
                                                    src="{{ url('frontend/images/banks/g-pay.png') }}" alt=""
                                                    class="mx-md-3 w-40"> <span>Google UPI </span>
                                            </div>
                                        </div>

                                        <div class="col-md-9 mt-3">
                                            <div class="d-flex profile-form-border p-2">
                                                <input type="radio" name="wallets" class="form-check-radio"> <img
                                                    src="{{ url('frontend/images/banks/paytm.png') }}" alt=""
                                                    class="mx-3 w-40"> <span>Paytm UPI</span>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="profile-form-border p-4 mb-3">
                                    <div class="row">
                                        <h3 class="main-head">Cash On Delivery</h3>
                                        <div class="col-md-9 mt-3">
                                            <div class="d-flex profile-form-border p-2">
                                                <input type="radio" name="wallets" class="form-check-radio"> <span
                                                    class="mx-3">Pay On Delivery</span>
                                            </div>
                                        </div>




                                    </div>


                                </div>
                            </div>
                        </div>

                </div>
                <div class="col-md-5">
                    <div class="padding-order-summary">
                        <div class="d-flex py-0 my-0 justify-content-between">
                            <h5 class="main-head py-0 my-0">Login Details</h5>
                            <p class="text-red py-0 my-0 ">Change</p>
                        </div>
                        <hr>
                        <div class=" ">
                            <p class="text-muted py-0 my-0">Nishchay Luthra</p>
                            <p class="text-muted py-0 my-0"> nishchayluthra@gmail.com </p>
                        </div>
                        <hr>

                        <div class="my-2">

                            <h5 class="main-head ">Estimated Delivery</h5>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted">29 march <span class="mx-2"> Wednesday</span></p>
                                <p>(item 1)</p>
                            </div>

                            <div class="">
                                <img src="frontend/images/products/skin/sk1.png" class="single-item" alt=""
                                    style="width:70px">
                            </div>

                        </div>
                        <hr>

                        <div class="d-flex justify-content-between ">
                            <h5 class="main-head">Price Details</h5>

                        </div>
                        <div class="d-flex justify-content-between ">
                            <small class="text-muted">Total MRP :</small>
                            <small><i class="fa fa-inr"></i>145.55</small>
                        </div>
                        <div class="d-flex justify-content-between ">
                            <small class="text-muted">Subtotal:</small>
                            <small><i class="fa fa-inr"></i>145.55</small>
                        </div>
                        <div class="d-flex justify-content-between ">
                            <small class="text-muted">Shipping Charges :</small>
                            <small><i class="fa fa-inr"></i>40</small>
                        </div>
                        <div class="d-flex justify-content-between my-3">
                            <h6 class="main-head">Order Total</h6>

                            <small><i class="fa fa-inr"></i>185.55</small>
                        </div>
                        <hr>

                    </div>


                </div>

            </div>
        </div>
        </div>
        </div>
        </div>


    </section>

    {{-- @include('frontend.not-found') --}}

@endsection
