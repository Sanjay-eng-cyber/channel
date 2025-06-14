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

    <section>
        <div class="container">
            <div class="row d-flex justify-content-center gap-3">
                <div class="col-lg-10 col-xl-5">
                    <div class="p-4 order-return-first-main">
                        <div class="order-return-first-search">
                            <h6 class="main-head py-3 or-first-card-color text-capitalize">What is the issue with the item?</h6>
                            <select class="form-select or-first-card-select" aria-label="Default select example" style="">
                                <option selected >Choose A Response</option>
                                <option value="1" class="text-capitalize">product damaged but shipping box ok </option>
                                <option value="2"  class="text-capitalize">product and shipping box both damaged</option>
                                <option value="3"  class="text-capitalize">wrong item was sent</option>
                                <option value="4"  class="text-capitalize">item defective or not working</option>
                                <option value="5"  class="text-capitalize">items or part missing</option>
                            </select>
                        </div>

                        <div class="pt-4 order-return-first-add-one">
                            <h6 class="main-head pt-3 or-first-card-color text-capitalize">Add photos of the item</h6>
                            <p class="text-capitalize">Capture photos of each item separately with visible defects. Wait for photos to upload. </p>

                            <label for="file-upload" class="btn">
                                Add Photos
                            </label>
                            <input id="file-upload" type="file" style="display: none;">
                        </div>

                        <div class="pt-5 order-return-first-add-second">
                            <h6 class="main-head or-first-card-color text-capitalize">Add photos of the item</h6>
                            <P class="text-capitalize">Capture photos of each item separately with visible defects. Wait for photos to upload.</P>

                            <img src="frontend/images/order-img/or-1.png" alt="" class="img-fluid py-3"
                                style="width: 123px;">
                            <label for="file-upload" class="btn ">
                                Add Photos
                            </label>
                            <input id="file-upload" type="file" style="display: none;">
                        </div>

                        <div class="py-4 order-return-first-cmnt ">
                            <h6 class="main-head pt-3 or-first-card-color">Comments (Optional):</h6>
                            <input type="text" class="form-control w-50" placeholder="Add Comment"
                                aria-label="Input field" aria-describedby="basic-addon2">

                        </div>
                    </div>

                </div>

                <div class="col-lg-10 col-xl-6 or-firstpage-scard">
                    <div class="p-4 or-firstpage-scard">

                            <h6 class="main-head py-3 or-firstpage-scard-fhead text-capitalize">What is the issue with the item?</h6>
                            <div class="row pt-3 pb-3 or-firstpage-scard-card">
                                <div class="col-sm-4 or-firstpage-scard-card-img" style="">
                                    <img src="frontend/images/products/skin/sk1.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-sm-8 or-firstpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
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
                            <button type="button" class="btn btn-orange or-firstpage-lbtn mt-4">Continue To Return</button>
                    </div>
                </div>
            </div>
       </div>
    </section>
@endsection


