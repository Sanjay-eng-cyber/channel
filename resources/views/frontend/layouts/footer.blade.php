<!-- footer of the Page -->
<footer id="mt-footer" class="style2 wow fadeInUp custome-footer position-relative" data-wow-delay="0.6s">
    <img src="{{ url('frontend/images/footer/ft-1.png') }}" alt="" class="footer-absolute-img1">
    <img src="{{ url('frontend/images/footer/ft-2.png') }}" alt="" class="footer-absolute-img2">

    {{-- <img src="" alt=""> --}}

    <!-- F Promo Box of the Page end -->
    <!-- Footer Holder of the Page -->
    <div class="footer-holder dark mt-paddingbottomxs-hide-holder ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12  col-md-12 col-lg-4 col-xl-4 mt-paddingbottomxs footer-first-order">
                    <!-- F Widget About of the Page -->
                    <div class="f-widget-about">
                        <div class="logo pt-md-0 pt-3 ">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('frontend/images/channel-logo.svg') }}" height="30"
                                    alt="Channel"></a>
                        </div>
                        <p>Exercitation ullamco laboris nisi ut aliquip ex<br> commodo consequat. Duis aute
                            irure</p>
                        <ul class="list-unstyled d-flex gap-2 p-0">
                            <li>
                                <i class="fas fa-map-marker-alt text-red"></i>
                            </li>
                            <li>
                                Shop No. 5 & 6, Sunview Apartment, Tilak Nagar, Chembur (West), Mumbai - 400089.
                            </li>
                        </ul>
                        {{-- <ul class="list-unstyled  gap-2 p-0 contact-pc-version">
                            <li class="gap-2 d-flex align-items-center footer-links-hover mt-sm-0 mt-3">
                                <i class="fas fa-clock  text-red"></i>
                                <span>Mon-Sat 10:00am to 6.00pm</span>
                            </li>
                        </ul> --}}
                        <ul class="list-unstyled  gap-2 p-0 contact-pc-version">
                            <li>
                                <i class="fas fa-phone  text-red"></i>
                            </li>
                            <li>
                                <a href="tel:+917710062724" class="footer-info">+91-7710062724</a>
                            </li>
                        </ul>
                        <ul class="list-unstyled  gap-2 p-0 contact-pc-version">
                            <li>
                                <i class="fas fa-envelope  text-red"></i>
                            </li>
                            <li>
                                <a href="mailto:channeltheshop@yahoo.co.in "
                                    class="footer-info">channeltheshop@yahoo.co.in </a>
                            </li>

                        </ul>

                        <ul class="list-unstyled contact-mobile-version d-sm-none d-block">
                            {{-- <li class="gap-2 d-flex align-items-center footer-links-hover mt-sm-0 mt-3">
                                <i class="fas fa-clock  text-red"></i>
                                <span>Mon-Sat 10:00am to 6.00pm</span>
                            </li> --}}
                            <li class="gap-2 d-flex align-items-center mt-sm-0 mt-3">
                                <i class="fas fa-phone  text-red"></i>
                                <a href="tel:+917710062724" class="footer-links-hover">+91-7710062724</a>
                            </li>

                            <li class="gap-2 d-flex align-items-center footer-links-hover mt-sm-0 mt-3">
                                <i class="fas fa-envelope  text-red"></i>
                                <a href="mailto:channeltheshop@yahoo.co.in ">channeltheshop@yahoo.co.in </a>
                            </li>



                        </ul>



                    </div>
                    <!-- F Widget About of the Page -->
                </div>


                <div class="container category-mobile-version">
                    <h3 class="f-widget-heading text-red ct-f-heading mt-4">Categories</h3>

                    <div class="row row-cols-3">

                        <div class="col">
                            <ul>
                                <li><a href="">Skin</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li><a href="">Fragrances</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li><a href="">Haircare</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li><a href="">Personal Care</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li><a href="">Home Decore </a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li><a href="">gift</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <nav
                    class="col-xs-12 mt-xl-0 mt-md-2 px-4 justify-content-start col-md-12 col-lg-5 col-xl-5 mt-paddingbottomxs mt-paddingbottomxs-hide cainco-breackpoint gap-4">


                    <!-- Footer Nav of the Page -->
                    <div class="nav-widget-1 cainco-breackpoint-category">
                        <h3 class="f-widget-heading text-red ct-f-heading">Categories</h3>
                        <ul class="list-unstyled f-widget-nav">
                            <li><a href="">Skin</a></li>
                            <li><a href="">Fragrances</a></li>
                            <li><a href="">Haircare</a></li>
                            <li><a href="">Personal Care</a></li>
                            <li><a href="">Home Decore </a></li>
                            <li><a href="">gift</a></li>
                        </ul>
                    </div>
                    <!-- Footer Nav of the Page end -->
                    <!-- Footer Nav of the Page -->
                    <div class="nav-widget-1 cainco-breackpoint-info d-sm-block">
                        <h3 class="f-widget-heading info-f-heading">Information</h3>
                        <ul class="list-unstyled f-widget-nav info-f-list text-start">
                            <li class="d-block"><a href="{{ route('frontend.about') }}">FAQ</a></li>
                            <li class="d-block"><a href="{{ route('frontend.contact-us') }}">BLOG</a></li>
                            <li class="d-block"><a href="">Support</a></li>

                        </ul>
                    </div>
                    <!-- Footer Nav of the Page end -->
                    <!-- Footer Nav of the Page -->
                    <div class="nav-widget-1 cainco-breackpoint-company d-sm-block ">
                        <h3 class="f-widget-heading c-f-heading">Company</h3>
                        <ul class="list-unstyled f-widget-nav  c-f-list">
                            <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                            <li><a href="{{ route('frontend.returns-and-refunds-policy') }}">Returns & Refunds
                                    Policy</a></li>

                            <li><a href="{{ route('frontend.shipping-policy') }}">Shipping Policy</a></li>
                            <li><a href="{{ route('frontend.contact-us') }}">Contact Us</a></li>


                        </ul>
                    </div>

                    <div class="container category-mobile-version d-none">
                        <h3 class="f-widget-heading text-red ct-f-heading mt-4">Company</h3>

                        <div class="row row-cols-3">

                            <div class="col">
                                <ul>
                                    <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="{{ route('frontend.returns-and-refunds-policy') }}">Returns & Refunds
                                            Policy</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="{{ route('frontend.shipping-policy') }}">Shipping Policy</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="{{ route('frontend.contact-us') }}">Contact Us</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                    <!-- Footer Nav of the Page end -->
                </nav>
                <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 text-right footer-second-order">
                    <!-- F Widget Newsletter of the Page -->
                    <div class="f-widget-newsletter f-widget-news-custome">
                        <h3 class="f-widget-heading f-widget-heading-sub" style="line-height:0px">Subscribe</h3>
                        <div class="holder">
                            <form class="newsletter-form form2" action="#" style="padding:6px">

                                <input type="email" class="form-control" placeholder="Your e-mail"
                                    style="border-radius:0px">
                                <button type="submit">
                                    <i class="fas fa-arrow-right"></i>
                                </button>

                            </form>
                        </div>
                        <p class="text-red">
                            Hello, we are Lift Media. Our goal is to translate the positive effects from
                            revolutionizing how companies engage with their clients & their team.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Holder of the Page end -->
    <!-- Footer Area of the Page -->

    <div class="footer-area p-0">
        <hr class="d-md-block d-none">

        <div class="container py-4">
            <div class="row">
                <div class="col-6 col-sm-7 footer-tpc">
                    <ul class="gap-2 gap-sm-4  p-0  footer-tpc-ul">
                        <a href="{{ route('frontend.terms-and-conditions') }}"
                            class="fw-bolder footer-links-hover-bottom">
                            Terms
                        </a>
                        <a href="{{ route('frontend.privacy-policy') }}" class="fw-bolder footer-links-hover-bottom">
                            Privacy
                        </a>
                        <a href="" class="fw-bolder footer-links-hover-bottom">
                            Cookies
                        </a>
                    </ul>

                </div>

                <div class="col-5 col-sm-5 footer-lifinsta">
                    <ul class="gap-2 gap-sm-4 footer-lifinsta-ul">
                        <li class="footer-lifinsta-tag-1">
                            <a href="https://www.linkedin.com/" class="social-icons">
                                <i class="fa-brands fa-linkedin-in text-red"></i>
                            </a>
                        </li>

                        <li class="footer-lifinsta-tag-2">

                            <a href="https://www.linkedin.com/" class="social-icons">
                                <i class="fa-brands fa-facebook-f text-red"></i>
                            </a>
                        </li>

                        <li class="footer-lifinsta-tag-3">

                            <a href="https://www.linkedin.com/" class="social-icons">
                                <i class="fa-brands fa-twitter text-red"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
        <hr class="d-md-none d-block">
        <div class="container pb-3">
            <div class="row">
                <div class="col-xs-12 col-sm-6 right_reserved">
                    <p class="footer-custome-c"> © 2023 channel. All Rights Reserved.</p>
                </div>
                <div class="col-xs-12 col-sm-6 text-end">

                    <p class="footer-custome-c">
                        Designed & Developed by
                        <a href="{{ url('https://www.acetrot.com/') }}" class="underline footer-custome-c"
                            target="_blank">Acetrot</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area of the Page end -->
</footer>
<a href="#" class="scroll-top">
    <i class="fa fa-arrow-up"></i>
</a>

<script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
<script src="/js/jquery.min.js"></script>
<script>
    @if (Session::get('alert-type') == 'success')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#1abc9c'
            });
        @endif
    @elseif (Session::get('alert-type') == 'info')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#2196f3'
            });
        @endif
    @elseif (Session::get('alert-type') == 'error')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#e7515a'
            });
        @endif
    @else
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#3b3f5c'
            });
        @endif
    @endif
</script>

<script>
    $(document).ready(function() {
        @if (session()->has('login_redirect') == true)
            $('#loginPopup').modal('show')
        @endif
    });
</script>

<script>
    $('a.add-to-cart').click(function() {
        if ($(this).attr("data-p-id")) {
            // console.log(this);
            var btn = $(this);
            axios.post('{{ route('frontend.p.addToCart') }}', {
                    product_id: $(this).attr("data-p-id")
                })
                .then(function(res) {
                    console.log(btn);
                    console.log(res.data);
                    if (res.data.status) {
                        if (res.data.addToCart) {

                            btn[0].classList.add('btn-outline-pink');
                            btn[0].innerHTML =
                                `<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg> Added`;
                        } else {
                            btn[0].classList.remove('btn-outline-pink');
                            btn[0].innerHTML = `Add To Cart`;
                        }
                        $('.cart-count')[0].innerHTML = res.data.count;
                        Snackbar.show({
                            text: res.data.message,
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#1abc9c'
                        });
                    } else {
                        Snackbar.show({
                            text: 'Something Went Wrong',
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    }
                })
                .catch(function(error) {
                    Snackbar.show({
                        text: "Something Went Wrong",
                        pos: 'top-right',
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                });
        }
    });

    document.querySelectorAll('.counter').forEach(item => {
        item.querySelector('.decrease-quantity').addEventListener('click', event => {
            var inputEl = item.querySelector('.quantity-input');
            var value = parseInt(inputEl.value);
            if (value > 1) {
                inputEl.value = value - 1;
            }
        });
        item.querySelector('.increase-quantity').addEventListener('click', event => {
            var inputEl = item.querySelector('.quantity-input');
            var value = parseInt(inputEl.value);
            inputEl.value = value + 1;
        });
    });
</script>
<script>
    $('button.add-to-wish').click(function() {
        if ($(this).attr("data-p-id")) {
            // console.log(this);
            var btn = $(this);
            axios.post('{{ route('frontend.p.addToWishlist') }}', {
                    product_id: $(this).attr("data-p-id")
                })
                .then(function(res) {
                    if (res.data.status) {
                        if (res.data.addToWishlist) {
                            btn[0].classList.add('active');
                            if (btn.find(".tool-tip-text").length) {
                                btn.find(".tool-tip-text")[0].innerHTML = "Remove From Wishlist";
                            }
                        } else {
                            btn[0].classList.remove('active');
                            if (btn.find(".tool-tip-text").length) {
                                btn.find(".tool-tip-text")[0].innerHTML = "Add to Wishlist";
                            }
                        }
                        Snackbar.show({
                            text: res.data.message,
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#1abc9c'
                        });
                    } else {
                        Snackbar.show({
                            text: res.data.message ?? 'Something Went Wrong',
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#2196f3'
                        });
                    }
                })
                .catch(function(error) {
                    console.log(error);
                    Snackbar.show({
                        text: "Something Went Wrong",
                        pos: 'top-right',
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                });
        }
    });
</script>


<script>
    window.onscroll = function() {
        var header_navbar = document.querySelector(".navbar-area");
        var sticky = header_navbar.offsetTop;


        // show or hide the back-top-top button
        var backToTo = document.querySelector(".scroll-top");
        if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
            backToTo.style.display = "flex";
        } else {
            backToTo.style.display = "none";
        };

        if (window.pageYOffset > sticky) {
            header_navbar.classList.add("sticky");
        } else {
            header_navbar.classList.remove("sticky");
        }

    };

    $('.scroll-top').hide();
    $(window).scroll(function() {

        if ($(this).scrollTop() > 120) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });
</script>

<script>
    $(".add-to-cart-btn").click(function() {
        $(this).toggleClass("btn-outline-pink");
        $(this).toggleClass("profile-btn-color");
    });
</script>

<script>
    $(".phone-pe-btn").hide();
    $(".phone-pe").click(function() {
        $(".upi-id").hide();
        $(".phone-pe-btn").toggleClass("d-block");

    });
</script>
<script>
    $(".upi-id").hide();
    $(".upi-btn").click(function() {
        $(".phone-pe-btn").removeClass("d-block");
        $(".upi-id").show();

    });
</script>

<script>
    var no2 = Math.floor((Math.random() * 9) + 1);
    var no3 = Math.floor((Math.random() * 9) + 1);
    var no4 = Math.floor((Math.random() * 9) + 1);


    document.getElementById("display2").innerHTML = no2;
    document.getElementById("display3").innerHTML = no3;
    document.getElementById("display4").innerHTML = no4;

    function Generate() {

        var no2 = Math.floor((Math.random() * 9) + 1);
        var no3 = Math.floor((Math.random() * 9) + 1);
        var no4 = Math.floor((Math.random() * 9) + 1);


        document.getElementById("display2").innerHTML = no2;
        document.getElementById("display3").innerHTML = no3;
        document.getElementById("display4").innerHTML = no4;

    }
</script>

<script>
    //SHOW TARGET CONTENT
    jQuery(function() {
        jQuery(document).ready(function() {
            jQuery('.showSingle').first().addClass('active');
            for (i = 2; i <= 4; i++) {
                jQuery('#div' + i).hide();
            }
        });
        jQuery('.showSingle').click(function() {
            jQuery('.targetDiv').hide();
            jQuery('#div' + $(this).attr('target')).show();
        });
    });

    //ACTIVE STATE
    $('button.showSingle').click(function(e) {
        e.preventDefault();
        $('button.showSingle').removeClass('active');
        $(this).addClass('active');
    });
</script>
{{-- @endsection --}}
