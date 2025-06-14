@extends('frontend.layouts.app')
@section('title', 'About-Us |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
<section class="my-2 pt-2">
    <div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Gift</a></li>

            <li class="breadcrumb-item bread-crum" aria-current="page">Gift Card</li>
        </ol>
        </nav>
    </div>
</section>
    <main id="mt-main">

        <section class="mt-product-detial wow fadeInUp " data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <!-- Slider of the Page -->
                        <div class="slider">

                               <div class="gift-card-top-heading">
                                    <h4 class="main-head my-2 text-start">
                                        Amazon Pay EGift Card
                                    </h4>
                               </div>
                                <hr>
                                <div class="gift-card-top-heading">
                                    <h5 class="main-head my-4 text-start text-capitalize">1. Select a style for your Gift Card</h5>
                                </div>
                                <ul class="list-unstyled slick-slider pagg-slider p-0">
                                    <li>
                                        <div class="img">
                                            <img src="https://via.placeholder.com/600" alt="image description">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <img src="https://via.placeholder.com/600" alt="image description">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <img src="https://via.placeholder.com/600" alt="image description">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <img src="https://via.placeholder.com/600" alt="image description">
                                        </div>
                                    </li>

                                </ul>

                            <div class="product-slider gift-card-sidebar mt-4">
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                            </div>

                        </div>

                        <div class="detial-holder gift-card-holder">
                            <h5 class="font-body py-3">
                                2. Enter Your Gift Card Details
                            </h5>

                            <form action="" method="post">
                                <div
                                    class="d-flex align-items-start align-items-sm-end flex-column flex-sm-row gift-card-amount">
                                    <label for="amount" class="form-label">
                                        <strong>Amount</strong>
                                    </label>
                                    <select class="form-select" id="amount" name="amount">
                                        <option selected disabled>Choose An Option</option>
                                        <option value="10">$10</option>
                                        <option value="25">$25</option>
                                        <option value="50">$50</option>
                                        <option value="100">$100</option>
                                    </select>
                                </div>

                                <div
                                    class="my-3 d-flex align-items-start align-items-sm-end flex-column flex-sm-row gift-card-qty">
                                    <label for="quantity" class="form-label">
                                        <strong>
                                            Quantity
                                        </strong>
                                    </label>
                                    <div class="input-group flex-nowrap" style="width:25%">
                                        <span class="input-group-text">-</span>
                                        <input type="number" id="qty" class="form-control" value="1">
                                        <span class="input-group-text">+</span>
                                    </div>
                                </div>

                                <div
                                    class="my-3 d-flex align-items-start align-items-sm-end flex-column flex-sm-row gift-card-delivery">
                                    <label for="delivery" class="form-label">
                                        <strong>
                                            Delivery
                                        </strong>
                                    </label>
                                    <div class="input-group">
                                        <input type="email" id="delivery" name="delivery" class="form-control"
                                            placeholder="Email">
                                    </div>
                                    <div class="input-group">
                                        <input type="email" id="delivery" name="delivery" class="form-control"
                                            placeholder="Link">
                                    </div>
                                </div>

                                <div
                                    class="my-3 d-flex align-items-start align-items-sm-end flex-column flex-sm-row gift-card-to">
                                    <label for="to" class="form-label">
                                        <strong>
                                            To
                                        </strong>
                                    </label>
                                    <input type="text" id="to" name="to" class="form-control"
                                        placeholder="Add Recipients Name">
                                </div>

                                <div
                                    class="my-3 d-flex d-flex align-items-start align-items-sm-end flex-column flex-sm-row gift-card-from">
                                    <label for="from" class="form-label">
                                        <strong>
                                            From
                                        </strong>
                                    </label>
                                    <input type="text" id="from" name="from" class="form-control"
                                        placeholder="Your Name">
                                </div>


                                <div
                                    class="my-3 d-flex align-items-start align-items-sm-end flex-column flex-sm-row gift-card-msg">
                                    <label for="message" class="form-label">
                                        <strong>
                                            Message
                                        </strong>
                                    </label>
                                    <select class="form-select" id="message" name="message">
                                        <option selected disabled>your Best Wishes From Us</option>
                                        <option value="happy-birthday">message1</option>
                                        <option value="congratulations">message2</option>
                                        <option value="thank-you">message3</option>
                                        <option value="thinking-of-you">message4</option>
                                    </select>
                                </div>

                                <div
                                    class="my-3 d-flex align-items-start align-items-sm-end flex-column flex-sm-row gift-card-ddate">
                                    <label for="delivery-date" class="form-label">
                                        <strong>
                                            Delivery Date
                                        </strong>
                                    </label>
                                    <input type="date" id="delivery-date" name="delivery-date" class="form-control "
                                        placeholder="Choose a date">
                                </div>

                            </form>

                            <div class="d-flex justify-content-around flex-wrap my-5">
                                <button class="btn btn-primary btn-pink">
                                    Add To Cart
                                </button>

                                <button class="btn btn-primary btn-black">
                                    Buy Now
                                </button>

                                <a class="btn text-red">

                                    <i class="fa-regular fa-heart"></i>
                                    Add To Wishlist
                                </a>
                            </div>



                            <div class="rating-holder">
                                <div class="row">
                                    <div class="col-12 col-sm-6 p-0">
                                        <div class="rating">
                                            <div class="d-flex align-items-center">
                                                <h6 class="h5 font-body mb-0 me-2">
                                                    Ratings
                                                </h6>
                                                <div class="five-stars text-green d-flex">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="rating-total d-flex align-items-center me-3">
                                                    <h6 class="h2 text-muted font-body mb-0">
                                                        4.3
                                                    </h6>
                                                    <i class="fa-solid fa-star text-green"></i>
                                                </div>
                                                <div class="rating-count text-muted">
                                                    based on Verified Buyers 1k
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 p-0">
                                        <div class="rating-stats text-muted">
                                            <div class="rating-stat">
                                                <div>
                                                    5
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 100%;"></div>
                                                </div>
                                            </div>
                                            <div class="rating-stat">
                                                <div>
                                                    4
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 80%;"></div>
                                                </div>
                                            </div>
                                            <div class="rating-stat">
                                                <div>
                                                    3
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                            <div class="rating-stat">
                                                <div>
                                                    2
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 40%;"></div>
                                                </div>
                                            </div>
                                            <div class="rating-stat">
                                                <div>
                                                    1
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 20%;"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- detial Holder of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Product detial of the Page end -->
        <section>
            <div class="container">

                <div class="row mb-5">
                    <div class="col-lg-7 col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="font-body mb-3">
                                        Customer Reviews
                                    </h4>
                                </div>
                                <div class="col-6">
                                    <h4 class="font-body mb-3 text-center text-muted">
                                        Write A Review
                                    </h4>
                                </div>
                            </div>

                            <div class="review-area">
                                <div class="review-card ">
                                    <div class="d-flex align-items-center">

                                        <div class="review-user">
                                            <img src="https://via.placeholder.com/150" alt="">
                                        </div>
                                        <div class="">
                                            <div class="d-flex review-head">
                                                <div class="five-stars text-green d-flex">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                                <div class="review-title">
                                                    <h6 class="font-body px-0">
                                                        {{--very good purchase--}}
                                                        Very Easy, Convenient, Modern Gifting
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="review-content">

                                        <div class="review-text">
                                            <p class="text-capitalize">
                                                I use this long stay intense kajal first time, it is very good black preal
                                                kajal,
                                                it's
                                                water proof, smudge proof
                                                long lasting, and dark shiny black. It's made by sunflower seeds oil and
                                                vitamin
                                                E,
                                                I'm very happy after using
                                                this product.
                                            </p>
                                            <p class="text-capitalize">
                                                It gives bold look in eyes and make eyes more beautiful. Totally satisfied
                                                with
                                                this
                                                eyes friendly product
                                            </p>
                                        </div>

                                        <div class="review-info text-muted d-flex flex-wrap justify-content-between">
                                            <div class="py-2">
                                                Kiran22
                                                <i class="fa-solid fa-star text-warning"></i>
                                                | June 2020
                                            </div>
                                            <div class="py-2">
                                                <button class="text-muted p-0 btn">
                                                    <i class="fa-solid fa-thumbs-up"></i>
                                                    200
                                                </button>
                                                |
                                                <button class="text-muted p-0 btn">
                                                    <i class="fa-solid fa-thumbs-down"></i>
                                                    10
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <h4 class="font-body mb-3">
                            Narrow Reviews By
                        </h4>
                        <div class="row row-cols-1 row-cols-sm-2 ">
                            <div class="col __1nw-rv pt-2 pt-sm-3 pb-2">
                                <div class="fw-bold text-red bg-lightpink p-2 text-center">Recent</div>
                            </div>
                            <div class="col  __1nw-rv pt-2 pt-sm-3 pb-2">
                                <div class="fw-bold text-red bg-lightpink p-2 text-center">By Certified Buyer</div>
                            </div>
                            <div class="col  __1nw-rv my-2 my-sm-2">
                                <div class="fw-bold text-red bg-lightpink p-2 text-center">By Positive </div>
                            </div>
                            <div class="col __1nw-rv my-2 my-sm-2">
                                <div class="fw-bold text-red bg-lightpink p-2 text-center">Most Helpful</div>
                            </div>
                            <div class="col  __1nw-rv my-2 my-sm-2">
                                <div class="fw-bold text-red bg-lightpink p-2 text-center">By Negative </div>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="row pb-4" style="padding-top:50px;">
                    <div class="col-lg-12 col-xl-6 or-secondpage-scard">
                        <div class="p-4 or-secondpage-scard">

                            <h5 class="main-head py-3 or-secondpage-scard-fhead text-capitalize">Recommended based on your purchase</h5>
                            <div class="row pt-3 pb-3 or-secondpage-scard-card">
                                <div class="col-sm-4 or-secondpage-scard-card-img" style="">
                                    <img src="frontend/images/products/skin/sk1.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-sm-8 or-secondpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
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
                            <button type="button" class="btn btn-orange or-secondpage-lbtn mt-4">Continue
                                Shopping</button>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
@endsection
