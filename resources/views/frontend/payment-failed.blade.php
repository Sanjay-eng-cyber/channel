@extends('frontend.layouts.app')
@section('title', 'Payment Failed |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <section>
       
        <div class="container p-md-3 p-4 my-5">
            <div class="row">
                <div class="col-12">
                    <div class="row d-flex justify-content-center">
                            <div class="col-md-6 col-lg-4 custom-boder">
                                <div class="py-5">
                                    <div class="mb-2">
                                        <img src="{{ 'frontend/images/svg/fail-paymet.svg' }}" alt="" class="img-fluid mx-auto" style="width:250px">
                                    </div>
                                    <h5 class="text-center fw-500 mt-md-0 mt-3" style="color:#D02A2A">Your Payment is Failed</h4>
                                    <p class="text-center custom-id-text">Payment ID :Re7777r3</p>
                                    <div class="text-center">
                                        <a href="/" class="btn btn-orange or-secondpage-lbtn ">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
@endsection
