@extends('frontend.layouts.app')
@section('title', 'Contact-Us |')
@section('content')
  <!-- Main of the Page -->
  <main id="mt-main">
    <!-- Mt Contact Banner of the Page -->
    <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
    style="background-image: url(frontend/images/img06.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h1>CONTACT</h1>
          <nav class="breadcrumbs">
            <ul class="list-unstyled">
              <li><a href="{{route('frontend.index')}}">Home <i class="fa fa-angle-right"></i></a></li>
              <li>Contact Us</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- Mt Contact Banner of the Page -->
    <!-- Mt Map Descrp of the Page -->
    <section class="mt-map-descrp wow fadeInUp" data-wow-delay="0.4s">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h1>schön. chair maker</h1>
            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
              nostrud <br>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
              dolor in reprehenderit in voluptate velit sse cillum <br>dolore eu fugiat nulla pariatur. Excepteur
              sint occaecat cupidatat</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Mt Map Descrp of the Page end -->
    <!-- Mt Contact Detail of the Page -->
    <div class="mt-contact-detail wow fadeInUp" data-wow-delay="0.4s">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4 mt-paddingbottomxs text-center">
            <span class="icon"><i class="fa fa-map-marker"></i></span>
            <strong class="title">ADDRESS</strong>
            <address>Suite 18B, 148 Connaught Road Central <br>New Yankee</address>
          </div>
          <div class="col-xs-12 col-sm-4 mt-paddingbottomxs text-center">
            <span class="icon"><i class="fa fa-phone"></i></span>
            <strong class="title">PHONE</strong>
            <a href="#">+1 (555) 333 22 11</a>
          </div>
          <div class="col-xs-12 col-sm-4 mt-paddingbottomxs text-center">
            <span class="icon"><i class="fa fa-envelope-o"></i></span>
            <strong class="title">E_MAIL</strong>
            <a href="#">info@schon.chair</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Mt Contact Detail of the Page end -->
    <!-- Mt Form Section of the Page -->
    <section class="mt-form-sec wow fadeInUp" data-wow-delay="0.4s">
      <div class="container">
        <div class="row">
          <header class="col-xs-12 text-center header">
            <h2>Have a question?</h2>
            <p> exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br>Duis aute irure dolor in
              reprehenderit in voluptate velit sse cillum dolore eu fugiat nulla pariatur.</p>
          </header>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <!-- Contact Form of the Page -->
            <form action="#" class="contact-form">
              <fieldset>
                <input type="text" class="form-control" placeholder="Name">
                <input type="email" class="form-control" placeholder="E-Mail">
                <input type="text" class="form-control" placeholder="Subject">
                <textarea class="form-control" placeholder="Message"></textarea>
                <button class="btn-type3" type="submit">Send</button>
              </fieldset>
            </form>
            <!-- Contact Form of the Page end -->
          </div>
        </div>
      </div>
    </section>
    <!-- Mt Form Section of the Page -->
  </main>
  <!-- footer of the Page -->
@endsection
