@extends('frontend.layouts.app')
@section('title', 'Review Index |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
<x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />
<section class="mt-3">
    <div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="bread-crum">Profile</a></li>
            <li class="breadcrumb-item bread-crum" aria-current="page">Review</li>
        </ol>
        </nav>
    </div>
</section>

<section style="padding:0px 0px 65px 0px">
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-sm-10">
                <div class="row">

                 <div class="rv-show-switch my-3">
                    <div class="review-center-switch d-flex gap-5 justify-content-center mb-5 mb-md-0">
                        <h5 class="main-head">Contribute</h5>
                        <h5 class="main-head">Your Review</h5>
                    </div>

                    <div class="rv-show-side-switch d-flex gap-2 justify-content-end">
                        <div class="review-old-cl">Older</div>
                        <div class="review-slash">|</div>
                        <div class="review-old-cl">Newer</div>
                    </div>

                 </div>


                </div>
            </div>

        </div>

        <div class="row d-flex justify-content-center rv-show-main">

            <div class="col-sm-10 review-popup-ui">
                <button type="button" class="btn-close review-popup-btn" aria-label="Close" data-bs-toggle="modal" data-bs-target="#review-popup"></button>
                <div class="row rv-show-section p-3">
                  <div class="col-12 col-xl-3 rv-show-img">
                        <div class="review-first-subsection-img">
                            <img src="frontend/images/products/skin/sk1.png" class="img-fluid img-border m-auto m-xl-0" alt="" style="width:170px">
                        </div>
                  </div>

                   <div class="col-12 col-xl-8 rv-show-desc mt-4 mt-xl-0">
                            <div class="d-flex flex-column justify-content-center rv-show-subsection">
                             <div class="d-flex justify-content-between">
                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                             </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <h6 class="main-head">Your Review</h6>
                                        <hr>
                                        <div class="rating d-flex flex-row justify-content-start gap-2 text-green" style="height:30%">
                                            <span class="fas fa-star review-star-color" data-value="1"></span>
                                            <span class="fas fa-star review-star-color" data-value="2"></span>
                                            <span class="fas fa-star review-star-color" data-value="3"></span>
                                            <span class="fas fa-star review-star-color" data-value="4"></span>
                                            <span class="far fa-star review-star-color" data-value="5"></span>

                                        </div>
                                        <h6 class="main-head">"Heading here "</h6>
                                    </div>
                                    <div class="col-12 col-md-9 my-3 my-md-0">
                                        <p class="text-capitalize">
                                            I use this long stay intense kajal first time, it is very good black preal kajal, it's water proof, smudge proof long lasting, and dark shiny black. It's made by sunflower seeds oil and vitamin E, I'm very happy after using this product.
                                                It gives bold look in eyes and make eyes more beautiful. Totally satisfied with this eyes friendly product
                                            lorem
                                            </p>

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

@include('frontend.not-found')

<div class="modal fade auth-popup" id="review-popup" tabindex="-1" aria-labelledby="loginPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-body" style="overflow:hidden;">
                    <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                        aria-label="Close">
                        <img src="{{ url('frontend/images/icons/icon-close.svg') }}" style="width: 51px;"
                            alt="">
                    </button>

                    <div class="auth-popup-body" v-if="!requested">
                       <img src="{{asset('frontend/images/popup/review-show.png')}}" class="img-fluid m-auto" alt="" srcset="" style="width:210px">
                        <h4 class="dispaly-6 main-head text-black mt-3 mb-2">Are You Sure!</h4>
                        <div class="d-flex justify-content-evenly my-4">
                            <button type="button" class="btn btn-lightpink px-4 btn-lg">Yes</button>
                            <button type="button" class="btn btn-pink px-4 btn-lg">No</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
