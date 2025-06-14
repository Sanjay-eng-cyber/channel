@extends('frontend.layouts.app')
@section('title', 'Payment |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Payment</li>
                </ol>
            </nav>
        </div>
    </section>
    <section style="padding:0px 0px 50px 0px">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <h2 class="text-center text-red mb-4">Your Payment Method</h2>



                <div class="col-md-6">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item border ">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <span class="span-w-90-per">Cash On Delivery</span> <img
                                        src="{{ url('frontend/images/icons/green-check.png') }}" alt=""
                                        class="img-w-20">
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">


                                    <div class="row mt-3 justify-content-center">
                                        <div class="col-md-2 px-md-0  text-center">
                                            <div class="p-0 m-0 rounded captcha">
                                                <h3 class="d-inline text-success"><p id="area" class="d-inline"><span id="display2"></span><span id="display3"></span><span id="display4"></span></p></h3>
                                                <p class="d-inline"> <i class="fa fa-refresh text-red" onclick="Generate()"></i></p>
                                            </div>
                                        </div>

                                        <div class="col-md-6  mt-md-0 mt-3  text-center">

                                            <input type="text" class="form-control " id=""
                                                placeholder="Enter The Characters">
                                        </div>
                                        <div class="col-md-4 px-0  mt-md-0 mt-3  text-center">
                                            <button type="submit"
                                                class="btn mx-auto text-center  pay-now mb-2 py-1">Confirm Order</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border mt-2">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    <span class="span-w-90-per"> UPI Payments</span> <img
                                        src="{{ url('frontend/images/icons/green-check.png') }}" alt=""
                                        class="img-w-20">
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <h3 class="panel-title display-td text-center">Choose An Option</h3>
                                        <div class="form-group">
                                            <input type="radio" class="form-check-radio phone-pe" name="upi"
                                                id="phonepe"> <label for="phonepe">PhonePe</label>
                                        </div>
                                        <button
                                            class="btn btn- btn-lg btn-block mx-auto text-center mt-3 pay-now phone-pe-btn w-25">Continue
                                        </button>
                                        <div class="form-group mt-3">
                                            <input type="radio" class="form-check-radio upi-btn" name="upi"
                                                id="upiid"> <label for="upiid">Your UPI ID</label>
                                        </div>

                                        <div class="row mt-3 upi-id">


                                            <div class="col-6">

                                                <input type="text" class="form-control" id=""
                                                    placeholder="Enter UPI ID">
                                            </div>
                                            <div class="col-6">
                                                <button type="submit"
                                                    class="btn btn- btn-lg btn-block mx-auto text-center  pay-now mb-2 py-1">Pay
                                                    <i class="fa fa-inr"></i> 199</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border mt-2">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    <span class="span-w-90-per"> Net Banking</span> <img
                                        src="{{ url('frontend/images/icons/green-check.png') }}" alt=""
                                        class="img-w-20">
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <h3 class="panel-title display-td text-center mb-4">Popular Banks</h3>
                                        <div class="col-md-6 text-center text-md-start">
                                            <div class="form-group d-inline">
                                                <input type="radio" name="bank" class="form-check-radio"
                                                    id="hdfc"> <img src="frontend/images/icons/hdfc.png"
                                                    alt="" class="d-inline w-15 pb-1"> <label for="hdfc"
                                                    class="d-inline"> HDFC Bank</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-md-0 mt-3 text-center text-md-start">
                                            <div class="form-group d-inline">
                                                <input type="radio" name="bank" class="form-check-radio"
                                                    id="sbi"> <img src="frontend/images/icons/sbi.svg"
                                                    alt="" class="d-inline w-15 pb-1"> <label for="sbi"
                                                    class="d-inline"> State Bank Of India</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 ">

                                        <div class="col-md-6 text-center text-md-start">
                                            <div class="form-group d-inline">
                                                <input type="radio" name="bank" class="form-check-radio"
                                                    id="axis"> <img src="frontend/images/icons/axis.png"
                                                    alt="" class="d-inline w-15 pb-1"> <label for="axis"
                                                    class="d-inline">Axis Bank</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-md-0 mt-3 text-center text-md-start">
                                            <div class="form-group d-inline">
                                                <input type="radio" name="bank" class="form-check-radio"
                                                    id="icici"> <img src="frontend/images/icons/icici.png"
                                                    alt="" class="d-inline w-15 pb-1"> <label for="icici"
                                                    class="d-inline"> ICICI Bank</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h4 class="textmd-start text-center">Other Banks</h4>
                                            <select class="form-control">
                                                <option value="">Select Bank</option>
                                                <option value="">Kotak</option>
                                                <option value="">Punjab</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn- btn-lg btn-block mx-auto text-center  pay-now mb-2 py-1 mt-3">Pay
                                            <i class="fa fa-inr"></i> 199</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border mt-2">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                                    aria-controls="flush-collapseFour">
                                    <span class="span-w-90-per"> Credit / Debit Card</span> <img
                                        src="{{ url('frontend/images/icons/green-check.png') }}" alt=""
                                        class="img-w-20">
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">

                                    <div class="container">
                                        <div class="row">
                                            <!-- You can make it whatever width you want. I'm making it full width
                                                        on <= small devices and 4/12 page width on >= medium devices -->
                                            <div class="col-xs-12 col">


                                                <!-- CREDIT CARD FORM STARTS HERE -->
                                                <div class="panel panel-default credit-card-box">
                                                    <div class="panel-heading display-table">
                                                        <div class="row display-tr">
                                                            <h3 class="panel-title display-td text-center">Payment Details
                                                            </h3>

                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <form role="form" id="payment-form">
                                                            <div class="row mt-3">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label for="cardNumber">Card Number</label>
                                                                        <div class="input-group">
                                                                            <input type="tel" class="form-control"
                                                                                name="cardNumber"
                                                                                placeholder="Valid Card Number"
                                                                                autocomplete="cc-number" required
                                                                                autofocus />

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-xs-7 col-md-7">
                                                                    <div class="form-group">
                                                                        <label for="cardExpiry"><span
                                                                                class="hidden-xs">Expiration</span>Date</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="cardExpiry" placeholder="MM / YY"
                                                                            autocomplete="cc-exp" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-5 col-md-5 pull-right">
                                                                    <div class="form-group">
                                                                        <label for="cardCVC">CV CODE</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="cardCVC" placeholder="CVC"
                                                                            autocomplete="cc-csc" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label for="couponCode"> Coupon Code</label>
                                                                        <input type="text" class="form-control"
                                                                            name="couponCode" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12 text-center">
                                                                    <button
                                                                        class="btn btn- btn-lg btn-block mx-auto text-center mt-3 pay-now"
                                                                        type="submit">Pay Now</button>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="display:none;">
                                                                <div class="col-xs-12">
                                                                    <p class="payment-errors"></p>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- CREDIT CARD FORM ENDS HERE -->


                                            </div>



                                        </div>
                                    </div>

                                </div>
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
