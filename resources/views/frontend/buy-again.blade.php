@extends('frontend.layouts.app')
@section('title', 'Buy Again |')
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
                <li class="breadcrumb-item bread-crum" aria-current="page">My Order</li>
            </ol>
        </nav>
    </div>
</section>
<section style="padding:30px 0px 50px 0px">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-xl-4 col-xxl-5">
                <div class="input-group py-3">
                    <input type="text" class="form-control" placeholder="Search Order" aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2" style="background-color: rgba(236, 38, 143, 0.4);">
                        <i class="fas fa-search fa-fw text-red"></i>
                    </span>
                </div>
            </div>

            <div class="col-lg-9 col-xl-6 col-xxl-5 order-main">
                    <ul class="list-unstyled order-main-li-section" >
                    <li class="cmc wishlist-order" style="border-bottom: 4px solid rgba(0, 175, 239, 1);">
                        <a href="#home">
                            My Order
                        </a>
                    </li>
                    <li class="cmc wishlist-ship">
                        Not Yet Shipped
                    </li>
                    <li class="cmc wishlist-buy">
                        Buy Again
                    </li>
                    <li class="cmc can-ord">
                        Cancelled Orders
                    </li>
                    </ul>
            </div>

        </div>

        <div class="row py-4">
            <div class="d-flex justify-content-center wishlist-main">
                <div class="col-sm-9 wishlist-main-out">
                    <div class="row wishlist-main-in">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column wishlist-main-in-img">
                            <img src="frontend/images/products/skin/sk1.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6 wishlist-main-desc">

                            <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                            <p style="font-size: 14px;opacity: 0.6;">essence Long Lasting Eye Pencil is a creamy and
                                pigmented eye pencil that brightens and accentuates your eye more....</p>

                            <ul class="list-unstyled d-flex gap-3">
                                <li class="price" >From ₹ 145.55</li>
                                <li class="status">In Stock</li>
                            </ul>

                        </div>
                        <div class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0 wishlist-main-in-btn align-items-lg-end align-items-xl-center">
                            <button type="submit" class="btn profile-btn-color add-p-btn align-items-center">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-4">
            <div class="d-flex justify-content-center wishlist-main">
                <div class="col-sm-9 wishlist-main-out">
                    <div class="row wishlist-main-in">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column wishlist-main-in-img">
                            <img src="frontend/images/products/skin/sk1.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6 wishlist-main-desc">

                            <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                            <p style="font-size: 14px;opacity: 0.6;">essence Long Lasting Eye Pencil is a creamy and
                                pigmented eye pencil that brightens and accentuates your eye more....</p>

                            <ul class="list-unstyled d-flex gap-3">
                                <li class="price" >From ₹ 145.55</li>
                                <li class="status">In Stock</li>
                            </ul>

                        </div>
                        <div class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0 wishlist-main-in-btn align-items-lg-end align-items-xl-center">
                            <button type="submit" class="btn profile-btn-color add-p-btn align-items-center">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-4">
            <div class="d-flex justify-content-center wishlist-main">
                <div class="col-sm-9 wishlist-main-out">
                    <div class="row wishlist-main-in">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column wishlist-main-in-img">
                            <img src="frontend/images/products/skin/sk1.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6 wishlist-main-desc">

                            <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                            <p style="font-size: 14px;opacity: 0.6;">essence Long Lasting Eye Pencil is a creamy and
                                pigmented eye pencil that brightens and accentuates your eye more....</p>

                            <ul class="list-unstyled d-flex gap-3">
                                <li class="price" >From ₹ 145.55</li>
                                <li class="status">In Stock</li>
                            </ul>

                        </div>
                        <div class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0 wishlist-main-in-btn align-items-lg-end align-items-xl-center">
                            <button type="submit" class="btn profile-btn-color add-p-btn align-items-center">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row py-4">
            <div class="d-flex justify-content-center wishlist-main">
                <div class="col-sm-9 wishlist-main-out">
                    <div class="row wishlist-main-in">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column wishlist-main-in-img">
                            <img src="frontend/images/products/skin/sk1.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6 wishlist-main-desc">

                            <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                            <p style="font-size: 14px;opacity: 0.6;">essence Long Lasting Eye Pencil is a creamy and
                                pigmented eye pencil that brightens and accentuates your eye more....</p>

                            <ul class="list-unstyled d-flex gap-3">
                                <li class="price" >From ₹ 145.55</li>
                                <li class="status">In Stock</li>
                            </ul>

                        </div>
                        <div class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0 wishlist-main-in-btn align-items-lg-end align-items-xl-center">
                            <button type="submit" class="btn profile-btn-color add-p-btn align-items-center">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

@endsection
