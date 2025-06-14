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
                <li class="breadcrumb-item bread-crum" aria-current="page">Order Details</li>
            </ol>
        </nav>
    </div>
</section>

    <section style="padding: 20px 0px 65px 0px">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 col-xl-6">
                    <div class="p-4 order-return-first-main">
                        <div class="fw-bolder">Order Details</div>
                        <div class="d-flex gap-2 gap-md-4 py-2 flex-column flex-md-row">
                            <div class="fw-order-details">Ordered on 13 March 2023</div>
                            <div>Order# 403-2704927-5774705</div>
                        </div>

                        <div class="row py-3 px-3 px-md-0 profile-form-border">
                            <div class="col-md-4">
                                <div class="fw-order-details">
                                    Shipping Address
                                </div>
                                <div class="py-2" style="font-size: 13px">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti explicabo laboriosam exercitationem?
                                </div>
                            </div>

                            <div class="col-md-4 py-3 py-md-0">
                                <div class="fw-order-details">
                                    Payment Methods
                                </div>
                                <div class="py-2" style="font-size: 13px">
                                    BHIM UPI
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="fw-order-details">
                                    Order Summary
                                </div>
                                <div class="py-2" >
                                    <table class="table" style="font-size: 13px">

                                        {{-- <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">First</th>
                                            </tr>
                                        </thead> --}}

                                        <tbody>
                                            <tr>
                                              <td class="p-0" >Item(s) Subtotal:</td>
                                              <td class="p-0">219.00</td>
                                            </tr>

                                            <tr>
                                                <td class="p-0">Shipping:</td>
                                                <td class="p-0">0.00</td>
                                            </tr>

                                            <tr>
                                                <td class="p-0">Total:</td>
                                                <td class="p-0">219.00</td>
                                            </tr>

                                            <tr>
                                                <td class="p-0">Grand Total:</td>
                                                <td class="p-0">219.00</td>
                                            </tr>


                                        </tbody>

                                    </table>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>

                <div class="col-lg-12 col-xl-6 or-secondpage-scard py-4 py-xl-0">
                    <div class="px-4 pb-4 or-secondpage-scard">
                        <div class="text-end">
                            <button type="submit" class="btn btn-orange px-4">
                                <i class="fa fa-arrow-left"></i>
                                Back
                            </button>
                        </div>

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
                </div>

            </div>
        </div>
    </section>
@endsection

<style>
    .fw-order-details{
        font-weight: 500;
    }
</style>
