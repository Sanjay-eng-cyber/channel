@extends('frontend.layouts.app')
@section('title', 'Order Tracking First |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

<x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />
<section class="mt-4">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="bread-crum">Profile</a></li>
                <li class="breadcrumb-item"><a href="#" class="bread-crum">My Order</a></li>
                <li class="breadcrumb-item bread-crum" aria-current="page">Track Order</li>
            </ol>
        </nav>
    </div>
</section>

    <section>
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-lg-6">
                    <div class="order-track-border Scriptcontent p-4 ">

                        <!-- step-trackper HTML -->
                        <div class="step-track step-track-active">
                            <div class="">
                                <div class="circle-first">
                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="main-head text-black order-trak-head">Order Confirmed </h5>
                                        <div class="caption opacity-75">Fri, 17th Mar '23</div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-orange px-4">

                                            Order Details
                                        </button>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <h6 class="main-head text-black">Your Order has been placed.</h6>
                                    <div class="caption opacity-75">Fri, 17th Mar '23 - 10:56pm</div>
                                </div>
                                <div class="py-2">
                                    <h6 class="main-head text-black">Seller is processing your order.</h6>
                                    <div class="caption opacity-75">Sat, 18th Mar ¹23 - 9:44am</div>
                                </div>

                                <div class="py-2">
                                    <h6 class="main-head text-black">Item waiting to be picked up by courier partner.</h6>
                                    <div class="caption opacity-75">Sat, 18th Mar '23 - 12:00pm</div>
                                </div>



                            </div>
                        </div>
                        <div class="step-track">
                            <div>
                                <div class="circle-second"></div>
                            </div>
                            <div>
                                <h5 class="title main-head order-trak-head">Shipped Expected By Sun 19th Mar</h5>
                                <div class="caption">Item yet to be shipped</div>
                                <div class="caption">Expected by Sun, 19th Mar</div>
                                <div class="caption py-2">Item yet to reach hub nearest to you.</div>
                            </div>
                        </div>
                        <div class="step-track">
                            <div>
                                <div class="circle-third"></div>
                            </div>
                            <div>
                                <h5 class="title main-head order-trak-head">Out For Delivery</h5>
                                <div class="caption">Some text about Third step-track. </div>
                            </div>
                        </div>

                        <div class="step-track">
                            <div>
                                <div class="circle-fourth"></div>
                            </div>
                            <div>
                                <h5 class="title main-head order-trak-head">Delivery Expected By Tue 21st Mar</h5>
                                <div class="caption">Item yet to be delivered</div>
                                <div class="caption">Expected by Tue, 21st Mar</div>
                            </div>
                        </div>
                        <!-- End step-trackper HTML -->


                    </div>
                </div>

                <div class="col-12 col-lg-6 py-5 py-lg-0 py-xl-0 py-xxl-0  or-secondpage-scard">
                    <div class="profile-form-border p-4">
                        <div class="row display: flex; align-items: center">

                            <div class="col-6 py-2">
                                <h5 class="main-head text-red">Shipping Address</h5>
                            </div>

                            <div class="col-6 py-2">
                                <ul class="d-flex gap-4 list-unstyled justify-content-end">
                                    <li>
                                        <button type="button" class="btn position-relative profile-s-bg-color">
                                            Home
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle  bg-success border border-light rounded-circle profile-alert-icon">
                                                <i class="fas fa-check" style="color:white"></i>
                                                <span class="visually-hidden">New alerts</span>
                                            </span>
                                        </button>

                                    </li>
                                    <li>
                                        <i class="far fa-trash-alt fa-1x profile-trash-icon"></i>
                                        <!-- alternate trash icon with red background color and circle border radius -->
                                    </li>

                                </ul>
                            </div>

                            <div class="col-12">
                                <h6 class="main-head">User name</h6>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto facere quaerat eaque
                                    pariatur aliquam a expedita illum aliquid cumque quae!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="py-3"></div>



                    <div class="ship-channel-grid profile-form-border p-3">
                        <div class="ship-tab1">
                           <strong>
                            Shipped With
                            Channel
                           </strong>
                        </div>
                        <div>
                            |
                        </div>
                        <div class="ship-tab1">
                            <strong>
                                Tracking ID:
                                323021498947
                            </strong>
                        </div>
                        <div>
                            |
                        </div>
                        <div class="ship-tab1">
                          <strong>
                            Request
                            Cancelation
                          </strong>
                        </div>
                    </div>



                    <div class="py-3"></div>

                    <div class="p-4 or-secondpage-scard">

                        <h5 class="main-head py-3 or-secondpage-scard-fhead">Recommended based on your purchase</h5>
                        <div class="row pt-3 pb-3 or-secondpage-scard-card">
                            <div class="col-sm-4 or-secondpage-scard-card-img" style="">
                                <img src="frontend/images/products/skin/sk1.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-sm-8 or-secondpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
                                <h4 class="main-head">Essence Long Lasting Eye Pencil</h4>
                                <p>
                                    essence Long Lasting Eye Pencil is a creamy and pigmented eye pencil that brightens
                                    and
                                    accentuates your eye more....
                                </p>
                                <ul class="d-flex gap-5 p-0">
                                    <li class="no-bullet fw-bolder">
                                        From ₹145.55
                                    </li>
                                    <li>13 March 2023</li>
                                </ul>
                            </div>

                        </div>
                        <button type="button" class="btn btn-orange or-secondpage-lbtn mt-4">Continue Shopping</button>
                    </div>


                    <div class="row">
                        <div class="col-sm-12 py-5 text-end">
                            <button type="submit" class="btn btn-orange px-4">
                                <i class="fa fa-arrow-left"></i>
                                Back
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </section>

@endsection



<style>
    .order-track-border {
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 8px;
    }

    /* step-tracks */
    .step-track {
        position: relative;
        min-height: 1em;
        color: gray;
    }

    .order-trak-head {
        font-size: 1.1rem;
    }

    .step-track+.step-track {
        margin-top: 1.5em
    }

    .step-track>div:first-child {
        position: static;
        height: 0;
    }

    .step-track>div:not(:first-child) {
        margin-left: 2.5em;
        padding-left: 1em;
    }

    .step-track.step-track-active {
        color: black;

    }

    .step-track.step-track-active .circle-first {
        background-color: #1EBA11;
    }

    /* Circle */
    .step-track.step-track-active .circle-first {
        outline: 11px solid rgba(30, 186, 17, 0.2);
        background-color: rgba(30, 186, 17, 1);
        position: relative;
        width: 1.2em;
        height: 1.2em;
        line-height: 0em;
        border-radius: 100%;
        color: #fff;
        text-align: center;
        box-shadow: 0 0 0 3px #fff;
    }

    /* Vertical Line */
    .step-track.step-track-active .circle-first:after {
        content: ' ';
        position: absolute;
        display: block;
        top: 0px;
        right: 50%;
        bottom: 0px;
        left: 38%;
        height: 140px;
        width: 4px;
        transform: scale(1, 2);
        transform-origin: -10% 0%;
        background-color: rgba(30, 186, 17, 1);

    }

    .circle-second {
        background-color: #D9D9D9;
        position: relative;
        width: 1.2em;
        height: 1.2em;
        border-radius: 100%;
        color: #fff;
        text-align: center;
        box-shadow: 0 0 0 3px #fff;
    }

    .circle-second:after {
        content: ' ';
        position: absolute;
        display: block;
        top: 0px;
        right: 50%;
        bottom: 0px;
        left: 38%;
        height: 75px;
        width: 4px;
        transform: scale(1, 2);
        transform-origin: -10% 1%;
        background-color: #D9D9D9;
    }


    .circle-third {
        background-color: #D9D9D9;
        position: relative;
        width: 1.2em;
        height: 1.2em;
        border-radius: 100%;
        color: #fff;
        text-align: center;
        box-shadow: 0 0 0 3px #fff;
    }

    .circle-third:after {
        content: ' ';
        position: absolute;
        display: block;
        top: 0px;
        right: 50%;
        bottom: 0px;
        left: 38%;
        height: 46px;
        width: 4px;
        transform: scale(1, 2);
        transform-origin: 0% 0%;
        background-color: #D9D9D9;
    }

    .circle-fourth {
        background-color: #D9D9D9;
        position: relative;
        width: 1.2em;
        height: 1.2em;
        border-radius: 100%;
        color: #fff;
        text-align: center;
        box-shadow: 0 0 0 3px #fff;
    }

    .circle-fourth:after {
        content: ' ';
        position: absolute;
        display: block;
        top: 0px;
        right: 50%;
        bottom: 0px;
        left: 38%;
        height: 0px;
        width: 4px;
        transform: scale(1, 2);
        transform-origin: -10% 1%;
        background-color: #D9D9D9;
    }

    .step-track:last-child .circle:after {
        display: none;
    }

    /* step-trackper Titles */

    .caption {
        font-size: 16px;
    }
</style>
