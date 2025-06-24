   <!-- mt header style3 start here -->
   <header id="mt-header" class="style3" style="height: unset">

       <img src="frontend/images/nav-sb.png" alt="" class="img-fluid position-absolute" draggable="false"
           style="width: 110px;right:0; top:0">
       @if (Request::is('profile'))
           <img src="{{ asset('frontend/images/mobile-hero-slider/ab-pro.png') }}" alt=""
               class="img-fluid position-absolute main-ab-img" draggable="false">
       @endif
       @if (Request::is('wishlist'))
           <img src="{{ asset('frontend/images/mobile-hero-slider/ab-pro.png') }}" alt=""
               class="img-fluid position-absolute main-ab-img" draggable="false">
       @endif
       @if (Request::is('cart'))
           <img src="{{ asset('frontend/images/mobile-hero-slider/ab-pro.png') }}" alt=""
               class="img-fluid position-absolute main-ab-img" draggable="false">
       @endif

       @if (Request::is('orders'))
           <img src="{{ asset('frontend/images/mobile-hero-slider/ab-pro.png') }}" alt=""
               class="img-fluid position-absolute main-ab-img" draggable="false">
       @endif

       {{-- navbar header --}}
       <div class="" style="background:unset;">
           <div class="container pt-2  pb-1">
               <div class="row ">
                   <nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
                       <div class="container-fluid  d-flex flex-row">
                           <a class="navbar-brand d-inline d-lg-none  " href="{{ url('/') }}" style="">
                               <img height="35" src="{{ asset('frontend/images/channel-logo.svg') }}" alt="channel"
                                   class="img-fluid " style="width:130px">
                           </a>
                           <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                               aria-expanded="true" aria-label="Toggle navigation">
                               <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="navbar-collapse collapse  justify-content-between flex-row-reverse navdrop-style nav-color-active"
                               id="navbarSupportedContent" style="">
                               <ul class="navbar-nav d-none d-lg-flex  align-items-center nav-color-active-ul"
                                   style="gap:0.5rem">
                                   <li class="nav-item text-red position-relative">
                                       <a class="nav-color-btn {{ URL::current() == route('frontend.cart.index') ? 'active' : '' }}"
                                           href="{{ route('frontend.cart.index') }}">
                                           <svg width="65" height="65" viewBox="0 0 88 88" fill="#393535"
                                               xmlns="http://www.w3.org/2000/svg">
                                               <g filter="url(#filter0_d_542_119)">
                                                   <circle cx="44" cy="40" r="30" fill="white" />
                                               </g>
                                               <path
                                                   d="M51.8389 46.9052H39.2736C38.3426 46.9052 37.7938 46.066 37.733 45.2367C37.6856 44.589 37.9306 43.8746 38.4776 43.503L36.4653 32.8653C36.4301 32.6789 36.4685 32.4834 36.5698 32.3341C36.6709 32.1849 36.8242 32.098 36.9861 32.098H55.4666C55.6391 32.098 55.8015 32.1968 55.9015 32.3631C56.0015 32.5293 56.0271 32.7428 55.9703 32.9352L53.8415 40.1381C53.5772 41.0317 52.9226 41.6875 52.1332 41.8503L39.1941 44.5204C39.1925 44.5207 39.1909 44.521 39.189 44.5213C38.7893 44.6054 38.7872 45.0065 38.7962 45.1277C38.805 45.2493 38.8658 45.6454 39.2741 45.6454H51.8394C52.1338 45.6454 52.3727 45.9275 52.3727 46.2751C52.3727 46.6227 52.1335 46.9052 51.8389 46.9052ZM37.6514 33.3578L39.509 43.1772L51.9495 40.6104C52.3583 40.526 52.6975 40.1862 52.8343 39.7234L54.7156 33.3581L37.6514 33.3578Z" />
                                               <path
                                                   d="M39.4256 52C38.4616 52 37.6776 51.0743 37.6776 49.9361C37.6776 48.7978 38.4616 47.8718 39.4256 47.8718C40.3896 47.8718 41.1738 48.7975 41.1738 49.9361C41.1736 51.0743 40.3893 52 39.4256 52ZM39.4256 49.1316C39.0498 49.1316 38.7442 49.4924 38.7442 49.9364C38.7442 50.3797 39.0498 50.7409 39.4256 50.7409C39.8013 50.7409 40.1072 50.38 40.1072 49.9364C40.1069 49.4924 39.8013 49.1316 39.4256 49.1316Z" />
                                               <path
                                                   d="M50.3586 52C49.3946 52 48.6103 51.0743 48.6103 49.9361C48.6103 48.7978 49.3943 47.8718 50.3586 47.8718C51.3229 47.8718 52.1068 48.7975 52.1068 49.9361C52.1066 51.0743 51.3226 52 50.3586 52ZM50.3586 49.1316C49.9829 49.1316 49.677 49.4924 49.677 49.9364C49.677 50.3797 49.9826 50.7409 50.3586 50.7409C50.7346 50.7409 51.0402 50.38 51.0402 49.9364C51.0399 49.4924 50.7343 49.1316 50.3586 49.1316Z" />
                                               <path
                                                   d="M36.9853 33.3578C36.741 33.3578 36.5208 33.1584 36.4653 32.8653L36.0901 30.8813C35.9096 29.9263 35.2045 29.2595 34.376 29.2595H32.5333C32.2389 29.2595 32 28.9773 32 28.6297C32 28.2821 32.2389 28 32.5333 28H34.3757C35.7077 28 36.8408 29.0718 37.1312 30.6068L37.5064 32.5907C37.5706 32.9302 37.3896 33.2668 37.1021 33.3426C37.0629 33.353 37.0237 33.3578 36.9853 33.3578Z" />
                                               <circle cx="58.5" cy="25.5" r="2.5" fill="#F64D4D" />
                                               <defs>
                                                   <filter id="filter0_d_542_119" x="0.2" y="0.2" width="87.6"
                                                       height="87.6" filterUnits="userSpaceOnUse"
                                                       color-interpolation-filters="sRGB">
                                                       <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                       <feColorMatrix in="SourceAlpha" type="matrix"
                                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                           result="hardAlpha" />
                                                       <feOffset dy="4" />
                                                       <feGaussianBlur stdDeviation="6.9" />
                                                       <feComposite in2="hardAlpha" operator="out" />
                                                       <feColorMatrix type="matrix"
                                                           values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.11 0" />
                                                       <feBlend mode="normal" in2="BackgroundImageFix"
                                                           result="effect1_dropShadow_542_119" />
                                                       <feBlend mode="normal" in="SourceGraphic"
                                                           in2="effect1_dropShadow_542_119" result="shape" />
                                                   </filter>
                                               </defs>
                                           </svg>




                                           <span class="cart-has-item-icon cart-count"> {{ $cartItemsCount }}</span>
                                       </a>

                                   </li>

                                   @auth
                                       <li class="nav-item text-red">
                                           <a class="nav-color-btn {{ URL::current() == route('frontend.profile') ? 'active' : '' }}"
                                               href="{{ route('frontend.profile') }}">
                                               {{-- <i class="fas fa-user nn-top-cart-icon"></i> --}}

                                               <svg width="65" height="65" viewBox="0 0 88 88" fill="#393535"
                                                   xmlns="http://www.w3.org/2000/svg">
                                                   <g filter="url(#filter0_d_542_116)">
                                                       <circle cx="44" cy="40" r="30" fill="white" />
                                                   </g>
                                                   <path
                                                       d="M56 52.115H56.115V52V51.4667C56.115 45.5587 50.6663 40.7765 44 40.7765C37.3337 40.7765 31.885 45.5587 31.885 51.4667V52V52.115H32H56ZM54.6493 50.8183H33.3504C33.7294 45.9517 38.3493 42.0731 44 42.0731C49.6508 42.0731 54.2709 45.9517 54.6493 50.8183ZM37.2325 33.8627C37.2325 37.1722 40.2822 39.8406 44 39.8406C47.7178 39.8406 50.7675 37.1722 50.7675 33.8627C50.7675 30.5534 47.7178 27.885 44 27.885C40.2822 27.885 37.2325 30.5534 37.2325 33.8627ZM38.6728 33.8627C38.6728 31.2949 41.0486 29.1817 44 29.1817C46.9514 29.1817 49.3272 31.2949 49.3272 33.8627C49.3272 36.4307 46.9514 38.5439 44 38.5439C41.0486 38.5439 38.6728 36.4305 38.6728 33.8627Z"
                                                       stroke-width="0.23" />
                                                   <defs>
                                                       <filter id="filter0_d_542_116" x="0.2" y="0.2" width="87.6"
                                                           height="87.6" filterUnits="userSpaceOnUse"
                                                           color-interpolation-filters="sRGB">
                                                           <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                           <feColorMatrix in="SourceAlpha" type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                               result="hardAlpha" />
                                                           <feOffset dy="4" />
                                                           <feGaussianBlur stdDeviation="6.9" />
                                                           <feComposite in2="hardAlpha" operator="out" />
                                                           <feColorMatrix type="matrix"
                                                               values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.11 0" />
                                                           <feBlend mode="normal" in2="BackgroundImageFix"
                                                               result="effect1_dropShadow_542_116" />
                                                           <feBlend mode="normal" in="SourceGraphic"
                                                               in2="effect1_dropShadow_542_116" result="shape" />
                                                       </filter>
                                                   </defs>
                                               </svg>



                                           </a>
                                       </li>
                                       <li class="text-end ">
                                           <form action="{{ route('frontend.logout') }}" method="POST">
                                               @csrf
                                               <button class="btn text-pink p-0 m-0 fw-bold" type="submit">
                                                   LOGOUT
                                               </button>
                                           </form>
                                       </li>
                                   @else
                                       <li class="text-end ">
                                           <a href="#" data-bs-toggle="modal" data-bs-target="#loginPopup">
                                               <span class="text-red fw-bold">Login</span>
                                           </a>
                                       </li>
                                   @endauth

                               </ul>
                               <div class="navbar-nav d-inline d-lg-none text-start">
                                   <ul class="list-unstyled nav-dd-color isolation mynew-droparrow">
                                       <li class="nav-item dd-cl my-2">
                                           <a class="nav-link px-4  {{ URL::current() == route('frontend.index') ? 'active-red' : '' }} "
                                               aria-current="page" href="{{ route('frontend.index') }}">Home</a>
                                       </li>
                                       @foreach ($navCategories as $index => $navCategory)
                                           <li class="nav-item dropdown position-relative">

                                               <a href="{{ route('frontend.cat.show', $navCategory->slug) }}"
                                                   class="{{ URL::current() == route('frontend.cat.show', $navCategory->slug, $navCategory->slug) ? 'active-red' : '' }} px-4">
                                                   {{ $navCategory->name }}
                                               </a>

                                               {{-- <div class="nav-link text-capitalize nav-link dropdown-toggle mycustome-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               </div> --}}

                                               <div class="nav-link text-capitalize nav-link dropdown-toggle mycustome-toggle show dropdown-toggle"
                                                   href="#" id="navbarDropdown" role="button"
                                                   data-bs-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="true">
                                               </div>

                                               <div class="p-0 dropdown-menu " aria-labelledby="navbarDropdown">
                                                   <div class="text-capitalize p-2">
                                                       @foreach ($navCategory->subCategories as $navSubCategory)
                                                           <a class="dropdown-item"
                                                               href="{{ route('frontend.sub-category.show', ['categorySlug' => $navCategory->slug, 'subCategorySlug' => $navSubCategory->slug]) }}">{{ $navSubCategory->name }}</a>
                                                       @endforeach

                                                   </div>
                                               </div>
                                           </li>
                                       @endforeach

                                       {{-- <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'skin') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'skin') }}">Skin</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'fragrances') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'fragrances') }}">Fragrances</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'hair-care') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'hair-care') }}"> Hair Care</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'personal-care') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'personal-care') }}"> Personal
                                               Care</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'home-decor') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'home-decor') }}"> Home Decor</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'gift') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'gift') }}">Gift</a>
                                       </li> --}}
                                       @auth
                                           <li class="nav-item dd-cl">
                                               <form action="{{ route('frontend.logout') }}" method="POST">
                                                   @csrf
                                                   <a class="nav-link px-4" href="!#"
                                                       onclick="event.preventDefault();this.closest('form').submit();">
                                                       LOGOUT</a>

                                               </form>
                                           </li>
                                       @endauth
                                   </ul>
                               </div>
                               <ul class="nav navbar-nav d-none d-lg-inline">
                                   <a href="/">
                                       <img src="{{ asset('frontend/images/channel-logo.svg') }}" alt="schon"
                                           class="img-fluid" style="width: 180px">
                                   </a>
                               </ul>

                           </div>
                       </div>
                   </nav>
               </div>
           </div>
       </div>

       {{-- navbar --}}
       <div class="mt-bottom-bar py-0">
           <div class="container d-none d-lg-block px-0">
               <div class="row">
                   <div class="col-xs-12" style="padding-top: 12px;padding-bottom: 14px;">
                       <ul class="mt-icon-list ">

                           {{-- <li class="bg-red px-2 rounded my-2">
                               <a href="{{ route('frontend.cart.checkout') }}" class="text-white">
                                   CHECKOUT
                               </a>
                           </li> --}}

                           {{-- <li class="px-2 m-0 d-flex align-items-center">
                            <a href="{{ route('frontend.about') }}" class="text-dark" style="font-size: 1rem">
                                About Us
                            </a>
                        </li> --}}

                           <li>
                               <form action="{{ route('frontend.search.index') }}" method="GET"
                                   class="position-relative"
                                   style="isolation: isolate;background-color: white;border-radius:36px">
                                   <input type="text" class="form-control search-btn-newp my-input-form"
                                       placeholder="Search Product" aria-label="Search"
                                       aria-describedby="basic-addon1" name="q" value="{{ request('q') }}"
                                       style="padding-top: 18px;padding-bottom:18px;background-color:white;border-radius:36px;border-color:white">
                                   <button class="position-absolute  border-0 bg-transparent header-seach-icon"
                                       type="submit">
                                       <i class="fas fa-search fa-fw " style="color:#EC268F"></i>
                                   </button>
                               </form>
                           </li>


                       </ul>

                       <nav id="nav" class="navbar hide-navbar py-0 h-100 align-items-center">
                           <ul style="margin-right: 0px">
                               <li><a href="{{ route('frontend.index') }} "
                                       class=" {{ URL::current() == route('frontend.index') ? 'active-red' : '' }} text-capitalize">Home</a>
                               </li>
                               @foreach ($navCategories as $navCategory)
                                   <li class="nav-item dropdown">
                                       <a href="{{ route('frontend.cat.show', $navCategory->slug) }}"
                                           class="{{ URL::current() == route('frontend.cat.show', $navCategory->slug, $navCategory->slug) ? 'active-red' : '' }} nav-link text-capitalize ">
                                           {{ $navCategory->name }}
                                       </a>
                                       <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                           <div class="text-capitalize p-2 ">
                                               @foreach ($navCategory->subCategories as $navSubCategory)
                                                   <a class="dropdown-item"
                                                       href="{{ route('frontend.sub-category.show', ['categorySlug' => $navCategory->slug, 'subCategorySlug' => $navSubCategory->slug]) }}">{{ $navSubCategory->name }}</a>
                                               @endforeach

                                           </div>
                                       </div>
                                   </li>
                               @endforeach

                           </ul>
                       </nav>
                   </div>
               </div>
           </div>
       </div>
       <div class="d-lg-none d-block py-4" style="">
           <div class="container">
               <div class="row row-cols-4 ">
                   <div class="col">
                       <a href="{{ route('frontend.index') }}" class="gap-2 d-flex flex-column align-items-center">
                           <span>
                               <img src="{{ url('frontend/images/svg/footer/home.svg') }}" alt="">
                           </span>
                           <span>Home</span>
                       </a>
                   </div>
                   <div class="col">
                       <a class="gap-2 d-flex flex-column align-items-center toggle-display-trigger-by-id"
                           data-target="phone-search" href="#">
                           <span>
                               <img src="{{ url('frontend/images/svg/footer/search.svg') }}" alt="">
                           </span>
                           <span>Search</span>
                       </a>
                   </div>
                   <div class="col">
                       @auth
                           <a href="{{ route('frontend.profile') }}" class="gap-2 d-flex flex-column align-items-center">
                               <span>
                                   <img src="{{ url('frontend/images/svg/footer/account.svg') }}" alt="">
                               </span>
                               <span>Account</span>

                           </a>
                       @else
                           <a href="#" data-bs-toggle="modal" data-bs-target="#loginPopup"
                               class="gap-2 d-flex flex-column align-items-center">
                               <span>
                                   <img src="{{ url('frontend/images/svg/footer/account.svg') }}" alt="">
                               </span>
                               <span>Login</span>

                           </a>
                       @endauth
                   </div>
                   <div class="col" style="position: relative;z-index: 9999;">
                       <a href="{{ route('frontend.cart.index') }}"
                           class="gap-2 d-flex flex-column align-items-center">
                           <span>
                               <img src="{{ url('frontend/images/svg/footer/cart.svg') }}" alt="">
                           </span>
                           <span>Cart</span>
                       </a>
                   </div>
               </div>

               <div class="row" id="phone-search" style="display: none;">
                   <div class="col-12">
                       <form action="{{ route('frontend.search.index') }}" method="GET">
                           <div class="input-group mt-3">
                               <input type="text" class="form-control" placeholder="Search for products"
                                   aria-label="Search for products" aria-describedby="button-addon2" name="q"
                                   required value="{{ request('q') }}">
                               <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                       class="fas fa-search"></i></button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </header>


   <script>
       const {
           createApp
       } = Vue;
   </script>

   @guest('web')
       {{-- <livewire:log-in /> --}}
       <div id="login_div">
           <!-- login Modal -->
           <div class="modal fade auth-popup" id="loginPopup" tabindex="-1" aria-labelledby="loginPopupLabel"
               aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                   <div class="modal-content">

                       <div class="modal-body">
                           <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                               aria-label="Close">
                               <img src="{{ url('frontend/images/icons/icon-close.svg') }}" style="width: 51px;"
                                   alt="">
                           </button>

                           {{-- if otp not send --}}

                           {{-- @if ($step == 1) --}}
                           <div class="auth-popup-body" v-if="!requested">
                               <h4 class="text-pink  font-body my-4">
                                   Log In / Sign Up
                               </h4>
                               <form v-on:submit="submitMobileNo">
                                   <div class="input-group phone-number-arrow mb-3">
                                       <input type="text" class="form-control form-control-login px-0"
                                           placeholder="Enter Your Mobile Number" required minlength="10" maxlength="10"
                                           v-model="mobile_no">
                                       <button class="input-group-text" type="submit">
                                           <i class="fas fa-arrow-right"></i>
                                       </button>
                                   </div>
                                   <div v-if="error" v-for="(errorArray, idx) in errorTexts" :key='idx'>
                                       <div v-for="(allErrors, idx) in errorArray" :key='idx'>
                                           <span class="text-danger" v-text='allErrors'></span>
                                       </div>
                                   </div>
                                   {{-- <div class="row justify-content-center mx-auto">
                                       <p class="text-center text-black h6 py-3">Or Connect With</p>
                                       <div class="col-6 text-center">
                                           <button class="border-0 d-flex pt-2 links-btns mx-auto"><img
                                                   src="{{ url('frontend/images/icons/icon-fb.png') }}" alt=""
                                                   class="mx-2 icon-img-size"> Facebook</button>
                                       </div>

                                       <div class="col-6">
                                           <button class="border-0 d-flex pt-2 links-btns mx-auto"><img
                                                   src="{{ url('frontend/images/icons/icon-google.png') }}"
                                                   alt="" class="mx-2 icon-img-size"> Google</button>
                                       </div>
                                   </div> --}}
                               </form>
                           </div>
                           {{-- @elseif($step == 2) --}}
                           {{-- else otp sent --}}
                           <div class="auth-popup-body" v-if="requested">
                               <h4 class="text-pink  font-body my-4">
                                   Welcome
                               </h4>
                               <p class="text-muted text-start">OTP Has Been Sent To Your Registered Mobile Number
                                   @{{ mobile_no }}
                               </p>
                               <form v-on:submit="verifyOtp">
                                   <div class="input-group phone-number-arrow mb-2">
                                       <input type="text" class="form-control px-0 form-control-login"
                                           placeholder="Please Enter OTP" required id="otpNew" v-model="otp">
                                   </div>
                                   <div v-if="error" v-for="(errorArray, idx) in errorTexts" :key='idx'>
                                       <div v-for="(allErrors, idx) in errorArray" :key='idx'>
                                           <span class="text-danger" v-text='allErrors'></span>
                                       </div>
                                   </div>
                                   <div class=" justify-content-between mb-2 d-inline">
                                       <button type="button" class="f-left btn d-inline text-pink p-0 m-0 border-0"
                                           id="resend-otp-btn" id="resendOtpBtn" v-if="showResend"
                                           @click="resend">Resend OTP
                                       </button>
                                       <span class="text-muted m-0 f-right" id="otp-timer" v-if="showTimer"></span>
                                   </div>
                                   <div class="mb-3">
                                       <button type="submit" class="btn btn-pink w-100 mt-4">Verify OTP</button>
                                   </div>
                                   <button class="text-muted text-center btn" @click="back">Back To
                                       Log In</button>
                               </form>
                           </div>
                           {{-- @endif --}}

                       </div>
                   </div>
               </div>
           </div>
       </div>

       <script>
           createApp({
               data() {
                   return {
                       mobile_no: null,
                       otp: null,
                       requested: false,
                       error: false,
                       showTimer: false,
                       showResend: false,
                       countDown: null,
                       error: false,
                       errorTexts: '',
                       timer: 30,
                   }
               },
               methods: {
                   clearErrorMessage() {
                       this.error = false;
                       this.errorTexts = '';
                   },
                   sendOtp() {
                       this.clearErrorMessage();
                       axios.post("{{ route('frontend.send-otp') }}", {
                               phone: this.mobile_no
                           })
                           .then(res => {
                               if (res.data.success) {
                                   Snackbar.show({
                                       text: res.data.message,
                                       pos: 'top-right',
                                       actionTextColor: '#fff',
                                       backgroundColor: '#1abc9c'
                                   });
                                   this.requested = true;
                                   this.beginTimer();
                               }
                               if (!res.data.success) {
                                   this.requested = false;
                                   Snackbar.show({
                                       text: res.data.message,
                                       pos: 'top-right',
                                       actionTextColor: '#fff',
                                       backgroundColor: '#e7515a'
                                   });
                               }
                           })
                           .catch(err => {
                               this.requested = false;
                               this.error = true;
                               this.errorTexts = err.response.data.errors;
                           });
                   },
                   verifyOtp(e) {
                       e.preventDefault();
                       this.clearErrorMessage();
                       axios.post("{{ route('frontend.verify-otp') }}", {
                               phone: this.mobile_no,
                               otp: this.otp
                           })
                           .then(res => {
                               if (res.data.success) {
                                   this.showTimer = false;
                                   this.showResend = false;
                                   Snackbar.show({
                                       text: res.data.message,
                                       pos: 'top-right',
                                       actionTextColor: '#fff',
                                       backgroundColor: '#1abc9c'
                                   });
                                   setTimeout(() => {
                                       window.location.href = res.data.redirect_url ?? '/';
                                   }, 1000);
                               } else {
                                   Snackbar.show({
                                       text: res.data.message,
                                       pos: 'top-right',
                                       actionTextColor: '#fff',
                                       backgroundColor: '#e7515a'
                                   });
                               }
                           })
                           .catch(err => {
                               this.error = true;
                               this.errorTexts = err.response.data.errors;
                               //    Snackbar.show({
                               //        text: "Something Went Wrong",
                               //        pos: 'top-right',
                               //        actionTextColor: '#fff',
                               //        backgroundColor: '#e7515a'
                               //    });
                           });
                   },
                   resend() {
                       this.timer = 30;
                       this.sendOtp();
                   },
                   otpNew() {},
                   beginTimer() {
                       this.clearErrorMessage();
                       this.showResend = false;
                       this.countDown = window.setInterval(() => {
                           if (this.timer == -1) {
                               clearTimeout(this.countDown);
                               this.showTimer = false;
                               this.showResend = true;
                               this.otpNew();
                           } else {
                               this.showTimer = true;
                               $('#otp-timer').text(`Resend OTP in ${this.timer} seconds`)
                               this.timer--;
                               this.otpNew();
                           }
                       }, 1000);
                   },
                   submitMobileNo(e) {
                       e.preventDefault();
                       this.sendOtp();
                   },
                   back() {
                       this.requested = false;
                       this.showTimer = false;
                       this.showResend = false;
                       this.timer = 30;
                       this.clearErrorMessage();
                       clearTimeout(this.countDown);
                   }
               },
               created() {
                   //    console.log(this.timer) // 30
               }
           }).mount('#login_div')
       </script>
   @endguest

   {{-- we will move this styles in css file before production --}}

   <style>


   </style>
