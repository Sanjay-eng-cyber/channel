@extends('frontend.layouts.app')
@section('title', 'Contact |')
@section('content')
    {{-- first slider slider --}}
    <section class="pb-3">
        <div class="container">
            <div class="row justify-content-center my-5 px-sm-0 px-2">

                <div class="col-xl-12 col-xxl-11 p-3 p-sm-4 p-md-5 contact-border ">
                    <h2 class="text-red main-head text-center mb-3">Contact US</h2>
                    <div class="row main-group-card p-2 p-sm-4 contact-img ">
                        <h3 class="text-center text-white font-body">Contact Information</h3>
                        <p class="text-white text-center">Get In Touch</p>

                        <div class="col-lg-6  pt-md-5">

                            <ul class="list-unstyled mt-sm-4 mt-3">

                                <li class="gap-2 d-flex align-items-center mt-sm-4 mt-3">
                                    <i class="fas fa-phone  text-white"></i>

                                    <a href="tel:+917710062724"
                                        class="contact-us-link footer-links-hover text-white">+91-7710062724</a>
                                </li>

                                <li class="gap-2 d-flex align-items-center footer-links-hover mt-sm-4 mt-3">
                                    <i class="fas fa-envelope text-white"></i>
                                    <a href="mailto:support@channelonline.in "
                                        class="text-white contact-us-link">support@channelonline.in </a>
                                </li>





                            </ul>
                            <ul class="list-unstyled d-flex gap-2 p-0 mt-sm-4 mt-3">
                                <li>
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </li>
                                <li class="text-white">
                                    Shop No. 5 & 6, Sunview Apartment,<br /> Tilak Nagar, Chembur (West), Mumbai - 400089.
                                </li>


                            </ul>
                            <ul class="list-unstyled d-flex gap-2 p-0 mt-sm-4 mt-3">
                                <li class="gap-2 d-flex align-items-center footer-links-hover mt-sm-0 mt-3">
                                    <i class="fas fa-clock  text-white"></i>
                                    <span class="text-white">Mon-Sat | 10:00am to 6.00pm</span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-5 py-2 isolation-contact position-relative">

                            <img src="{{ asset('frontend/images/svg/first-circle-contact.svg') }}" alt="img"
                                class="img-fluid circle-first-contact">

                            <img src="{{ asset('frontend/images/svg/second-circle-contact.svg') }}" alt="img"
                                class="img-fluid circle-second-contact">
                            <div class="card-bg card p-3">
                                <form action="{{ route('frontend.contact.submit') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="recaptcha_response" value="" id="recaptchaResponse">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Name </label>
                                                <input type="text" class="form-control mt-2"
                                                    id="exampleFormControlInput1" placeholder="Name" name="name"
                                                    minlength="3" maxlength="30" value="{{ old('name') }}" required>
                                                @if ($errors->has('name'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group mt-3 mt-md-0">
                                                <label for="exampleFormControlInput1">Phone No. </label>
                                                <input type="text" class="form-control mt-2"
                                                    id="exampleFormControlInput1" placeholder="Phone Number" name="phone"
                                                    minlength="10" maxlength="10" value="{{ old('phone') }}" required>
                                                @if ($errors->has('phone'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('phone') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mt-3">
                                                <label for="exampleFormControlInput1">Email </label>
                                                <input type="email" class="form-control mt-2"
                                                    id="exampleFormControlInput1" placeholder="Enter Your Email"
                                                    name="email" minlength="5" maxlength="40" value="{{ old('email') }}"
                                                    required>
                                                @if ($errors->has('email'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mt-3">
                                                <label for="exampleFormControlTextarea1">Message</label>
                                                <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3" placeholder="Write Your Message"
                                                    name="message" minlength="5" maxlength="250" required>{{ old('message') }}</textarea>
                                                @if ($errors->has('message'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('recaptcha_response'))
                                        <div id="message-error " class="text-danger">
                                            {{ $errors->first('recaptcha_response') }}
                                        </div>
                                    @endif

                                    <button class="btn btn-block btn-parrot  w-100 mt-3" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script
        src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render={{ config('app.google_captcha_site_key') }}"
        async defer></script>
    <script>
        var onloadCallback = function() {
            // alert('hell')
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('app.google_captcha_site_key') }}', {
                    action: 'submit'
                }).then(function(token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                })
            })
        }
    </script>
@endsection
