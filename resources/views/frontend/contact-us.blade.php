@extends('frontend.layouts.app')
@section('title', 'Contact |')
    <style>
        .contact-border .contact-img {
            background: url('frontend/images/banner/contact-bg.png') !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            border-radius: 10px;

        }
    </style>
@section('content')
    {{-- first slider slider --}}
    <section class="pb-3">
        <div class="container">
            <div class="row justify-content-center my-5 px-sm-0 px-2">

                <div class="col-md-12 p-md-5 p-4 contact-border " >
                    <h2 class="text-red main-head text-center mb-3">Contact US</h2>
                  <div class="card pt-md-4">
                    <div class="row main-group-card pt-5 mx-md-4 mb-md-4 contact-img ">
                        <h3 class="text-center text-white">Contact Information</h3>
                        <p class="text-white text-center">Get In Touch</p>
                        <div class="col-lg-6 px-md-5 py-md-5">

                            <ul class="list-unstyled mt-sm-4 mt-3">

                                <li class="gap-2 d-flex align-items-center mt-sm-4 mt-3">
                                    <i class="fas fa-phone  text-white"></i>
                                    <a href="tel:+917710062724" class="contact-us-link footer-links-hover text-white">+91-7710062724</a>
                                </li>

                                <li class="gap-2 d-flex align-items-center footer-links-hover mt-sm-4 mt-3">
                                    <i class="fas fa-envelope text-white"></i>
                                    <a href="mailto:channeltheshop@yahoo.co.in "
                                        class="text-white contact-us-link">channeltheshop@yahoo.co.in </a>
                                </li>





                            </ul>
                            <ul class="list-unstyled d-flex gap-2 p-0 mt-sm-4 mt-3">
                                <li>
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </li>
                                <li class="text-white">
                                    Shop No. 5 & 6, Sunview Apartment, Tilak Nagar, Chembur (West), Mumbai - 400089.
                                </li>


                            </ul>
                            <ul class="list-unstyled d-flex gap-2 p-0 mt-sm-4 mt-3">
                                <li class="gap-2 d-flex align-items-center footer-links-hover mt-sm-0 mt-3">
                                    <i class="fas fa-clock  text-white"></i>
                                    <span class="text-white">Mon-Sat | 10:00am to 6.00pm</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5 py-5 ">
                            <div class="card-bg card py-5">
                                <div class="px-3 ">
                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Email </label>
                                      <input type="email" class="form-control mt-2" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>


                                    <div class="form-group mt-3">
                                      <label for="exampleFormControlTextarea1">Message</label>
                                      <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3" placeholder="Write Your Message"></textarea>
                                    </div>

                                </div>
                                <button class="btn btn-block btn-parrot mt-3 mx-3">Submit</button>
                            </div>
                        </div>

                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>



@endsection
