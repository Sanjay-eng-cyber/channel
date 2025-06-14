@extends('frontend.layouts.app')
@section('title', 'Payment Success |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <section>
        <div class="container p-md-3 p-4">
            <div class="row justify-content-center mt-md-5 py-5 custom-boder">
                <div class="col-12">
                    <div class="mb-2">
                        <img src="{{ 'frontend/images/svg/success-paymet.svg' }}" alt="" class="img-fluid mx-auto" style="width:430px">
                    </div>
                    <h2 class="text-center custom-payment-head mt-md-0 mt-3"> Your Payment is Successful</h2>
                    <p class="text-center custom-id-text">Payment ID :Re7777r3</p>
                    <div class="text-center">
                        <a href="/" class="btn btn-orange or-secondpage-lbtn ">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
