@extends('frontend.layouts.app')
@section('title', 'Buy Again |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

    <section class="my-3">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">My Order</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Order Return</li>
                </ol>
            </nav>
        </div>
    </section>

    <section style="padding: 0px 0px 100px 0px">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-10 col-xl-6">


                    <div class="p-4  or-secondpage-fcard">

                        <div class="or-secondpage-fcard-top">
                            <h5 class="main-head or-secondpage-fcard-head text-capitalize" style="">Issue with the
                                item?</h5>
                            <ul>
                                <li>
                                    <div class="text-capitalize">product damaged but shipping box ok </div>
                                </li>
                                <li>
                                    <div class="text-capitalize">image uploaded</div>
                                </li>
                            </ul>


                        </div>
                        <div
                            class="d-flex flex-column  justify-content-end align-items-end or-secondpage-fcard-bottom py-3 py-sm-0">
                            <button type="button" class="btn  mb-1 or-sp-first-btn ">Request Summited</button>
                            <button type="button" class="btn  mt-2 or-sp-second-btn ">Cancel</button>
                        </div>

                    </div>


                    <div class="p-4 my-4 or-secondpage-fscard">
                        <div class="gap-2 or-secondpage-fs-top">
                            <div class="or-secondpage-fscard-top">
                                <h5 class="main-head  or-secondpage-fscard-head d-none d-md-block text-capitalize"
                                    style="">How can we make it right?</h5>

                                <h5 class="main-head  or-secondpage-fscard-head pt-3 pb-1 text-capitalize">Talk to customer
                                    service </h5>
                                <p class="pr-2 opacity-75 text-capitalize">
                                    Explain the issues with items<br />
                                    Get instant resolution upon verification on issues
                                </p>
                            </div>
                            <div class="or-secondpage-fscard-imgTop">
                                <h5 class="main-head  or-secondpage-fscard-head d-block d-md-none" style="">How can we
                                    make it right?</h5>
                                <img src="frontend/images/order-img/or-2.png" alt="" class="img-fluid">
                            </div>
                        </div>

                        <div
                            class=" or-secondpage-fscard-bottom  d-flex gap-3 flex-column-reverse align-items-center
                            flex-sm-row">
                            <button type="button" class="btn  my-2 btn-orange px-5">
                                <i class="fas fa-phone"></i>
                                Call Me
                            </button>
                            <div>
                                <div>
                                    <div class="text-green">Available Now</div>
                                    <div>12 Am - 12 Am </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="p-4 my-4 or-secondpage-fscard">
                        <div class="gap-2 or-secondpage-fs-top">
                            <div class="or-secondpage-fscard-top">
                                <h5 class="main-head  or-secondpage-fscard-head d-none d-md-block text-capitalize"
                                    style="">How can we make it right?</h5>

                                <h5 class="main-head  or-secondpage-fscard-head pt-3 pb-1 text-capitalize">Talk to customer
                                    service </h5>
                                <p class="pr-2 opacity-75 text-capitalize">
                                    Explain the issues with items<br />
                                    Get instant resolution upon verification on issues
                                </p>
                            </div>
                            <div class="or-secondpage-fscard-imgTop">
                                <h5 class="main-head  or-secondpage-fscard-head d-block d-md-none" style="">How can we
                                    make it right?</h5>
                                <img src="frontend/images/order-img/or-3.png" alt="" class="img-fluid">
                            </div>
                        </div>

                        <div class=" or-secondpage-fscard-bottom">
                            <label for="" class="fw-bold">Your Number</label>
                            <input type="text" class="form-control mt-2 return-order-custome-input border-green "
                                id="return-order-custome-input" placeholder="Enter Number">

                            <button type="button" class="btn  my-2 btn-green text-white px-5"
                                style="border: 1px solid #F58634;">
                                Call Me Now
                            </button>

                        </div>
                    </div>





                </div>



                <div class="col-lg-10 col-xl-6 or-secondpage-scard">
                    <div class="p-4 or-secondpage-scard">

                        <h5 class="main-head py-3 or-secondpage-scard-fhead text-capitalize">Recommended based on your
                            purchase</h5>
                        <div class="row pt-3 pb-3 or-secondpage-scard-card">
                            <div class="col-sm-4 or-secondpage-scard-card-img" style="">
                                <img src="frontend/images/products/skin/sk1.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-sm-8 or-secondpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
                                <h4 class="main-head text-capitalize">Essence Long Lasting Eye Pencil</h4>
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
        </div>
    </section>
@endsection
