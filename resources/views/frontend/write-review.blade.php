@extends('frontend.layouts.app')
@section('title', 'Order Tracking First |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

    <section class="mt-3">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover" >My Order</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Write A Review</li>
                </ol>
            </nav>
        </div>
    </section>


    <section class="my-3">

        <div class="container">
            <div class="row write-review-bdr-all">


                <div class="col-12 col-lg-6 write-review-bdr-one">
                    <div class="p-0 p-sm-3">
                        <div>
                            <img src="frontend/images/products/skin/sk1.png" alt=""
                                class="img-fluid img-border m-auto m-lg-0" style="width:425px">
                        </div>

                        <div>
                            <div class="write-review-fw main-head pt-4 pb-2 text-capitalize">Essence Long Lasting Eye Pencil</div>
                            <div class="text-capitalize">essence Long Lasting Eye Pencil is a creamy and pigmented eye pencil that brightens and
                                accentuates your eye more....</div>
                        </div>

                        <hr>
                        <div>
                            <ul class="d-flex flex-column flex-md-row justify-content-between p-0 gap-2 gap-md-0">
                                <li class="write-review-fw ">Delivered <br /> 19 March 2023</li>
                                <li class="text-blue write-review-fw">Return Order</li>
                                <li class="write-review-fw no-bullet">From ₹145.55</li>
                            </ul>
                        </div>


                    </div>
                </div>


                <div class="col-12 col-lg-6 pt-5 pt-lg-0">
                    <div class="p-0 p-sm-3">
                        <h5 class="main-head">Write A Review</h5>
                        <hr>

                        <div class="pb-2">
                            <form action="" method="post">
                                <div class="d-flex justify-content-between flex-column flex-sm-row gap-1">
                                    <div>Give Your Rating</div>
                                    <div class="rating d-flex flex-row justify-contend-end gap-3">
                                        <span class="far fa-star review-star-color" data-value="1"></span>
                                        <span class="far fa-star review-star-color" data-value="2"></span>
                                        <span class="far fa-star review-star-color" data-value="3"></span>
                                        <span class="far fa-star review-star-color" data-value="4"></span>
                                        <span class="far fa-star review-star-color" data-value="5"></span>
                                    </div>
                                </div>

                                <div class="py-4">
                                    <textarea name="" id="" cols="30" rows="6" class="w-100 write-review-textarea text-start"
                                        placeholder="Enter Text"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-pink">Post Your Review</button>
                                </div>
                            </form>
                        </div>

                        <div class="review-guid-line my-2">
                            <div class="review-guid-line-heading">Review Guidelines</div>
                            <p class="text-capitalize">Once written and submitted, reviews are the sole property of channel. and channel reserves
                                the right to refuse
                                and remove any review/rating.
                                channel will not be held responsible or accept any liability of reviews posted for any
                                product/brand.
                                The opinions expressed in reviews are those of channel users and not of channel.</p>
                            <div class="review-guid-line-heading">Disclaimer</div>
                            <p class="text-capitalize">Once written and submitted, reviews are the sole property of channel. and channel reserves
                                the right to refuse
                                and remove any review/rating.
                                channel will not be held responsible or accept any liability of reviews posted for any
                                product/brand.
                                The opinions expressed in reviews are those of channel users and not of channel.</p>

                        </div>
                    </div>


                    <div>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 py-4 text-end">

                        <button type="submit" class="btn btn-orange px-4">
                            <svg class="svg-inline--fa fa-arrow-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg><!-- <i class="fa fa-arrow-left"></i> Font Awesome fontawesome.com -->
                            Back
                        </button>

                </div>
            </div>

            <div class="row">

            <div class="col-lg-12 col-xl-6 or-secondpage-scard">
                <div class="p-4 or-secondpage-scard">

                    <h5 class="main-head py-3 or-secondpage-scard-fhead text-capitalize">Recommended based on your purchase</h5>
                    <div class="row pt-3 pb-3 or-secondpage-scard-card">
                        <div class="col-sm-4 or-secondpage-scard-card-img" style="">
                            <img src="frontend/images/products/skin/sk1.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-8 or-secondpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
                            <h4 class="main-head">Essence Long Lasting Eye Pencil</h4>
                            <p class="text-capitalize">
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
    </section>



@endsection
