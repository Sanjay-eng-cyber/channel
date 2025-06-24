@extends('frontend.layouts.app')
@section('title', 'Payment Success |')
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
                                    <img src="{{ 'frontend/images/svg/success-paymet.svg' }}" alt=""
                                        class="img-fluid mx-auto" style="width:250px">
                                </div>
                                <h5 class="text-center fw-500 mt-md-0 mt-3" style="color:#1EBA11"> Your Payment is
                                    Successful</h4>
                                    @if ($transaction && $transaction->pg_payment_id)
                                        <p class="text-center custom-id-text">Payment ID : {{ $transaction->pg_payment_id }}
                                        </p>
                                    @endif
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
