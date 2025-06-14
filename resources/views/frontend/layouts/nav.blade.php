   <!-- mt header style3 start here -->
   <header id="mt-header" class="style3 position-relative ">

       <img src="frontend/images/nav-sb.png" alt="" class="img-fluid position-absolute" draggable="false"
           style="width: 110px;right:0; top:0">

       {{-- navbar header --}}
       <div class="mt-top-bar" style="background-color: white;color:black">
           <div class="container py-4">
               <div class="row ">
                   <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                           <div class="navbar-collapse collapse  justify-content-between flex-row-reverse navdrop-style"
                               id="navbarSupportedContent" style="">
                               <ul class="navbar-nav d-none d-lg-flex gap-3 align-items-center">
                                   @php
                                       $user = auth()->user();
                                       if ($user) {
                                           $cart = $user->cart;
                                       } else {
                                           $cart_session_id = session()->get('cart_session_id');
                                           $cart = $cart_session_id ? App\Models\Cart::where('session_id', $cart_session_id)->first() : null;
                                       }
                                       $cartItemsCount = $cart ? $cart->items()->count() : 0;
                                       $navCategories = App\Models\Category::with('subCategories')->get();
                                       //    dd($navCategories);
                                   @endphp
                                   <li class="nav-item text-red position-relative">
                                       <a class="nav-link fw-bold nn-top-cart"
                                           href="{{ route('frontend.cart.index') }}">
                                           <i class="fas fa-cart-plus  nn-top-cart-icon"> </i><span
                                               class="cart-has-item-icon cart-count"> {{ $cartItemsCount }}</span>
                                       </a>
                                   </li>

                                   @auth
                                       <li class="nav-item text-red">
                                           <a class="nav-link fw-bold nn-top-cart" href="{{ route('frontend.profile') }}">
                                               <i class="fas fa-user nn-top-cart-icon"></i>
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
                                   <ul class="list-unstyled nav-dd-color">
                                       <li class="nav-item dd-cl mt-3">
                                           <a class="nav-link px-4  {{ URL::current() == route('frontend.index') ? 'active-red' : '' }} "
                                               aria-current="page" href="{{ route('frontend.index') }}">Home</a>
                                       </li>
                                       @foreach ($navCategories as $navCategory)
                                           <li class="nav-item dd-cl">
                                               <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', $navCategory->slug) ? 'active-red' : '' }}"
                                                   href="{{ route('frontend.cat.show', $navCategory->slug) }}">{{ $navCategory->name }}</a>
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
                                       <img height="35" src="{{ asset('frontend/images/channel-logo.svg') }}"
                                           alt="schon" class="">
                                   </a>
                               </ul>
                               <div class="header-sub-1 header-top-search-icon d-none d-lg-inline">
                                   <form action="" method="get" class="">
                                       <input type="text" class="form-control px-4" placeholder="Search Product"
                                           aria-label="Search" aria-describedby="basic-addon1">
                                       <button class="position-absolute top-0 end-0 border-0 bg-transparent"
                                           type="submit">
                                           <i class="fas fa-search fa-fw header-seach-icon" style="color:#EC268F"></i>
                                       </button>
                                   </form>
                               </div>
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
                   <div class="col-xs-12">
                       <ul class="mt-icon-list pt-2 pt-md-0 pt-lg-2 pt-xl-0 pt-xxl-0">

                           {{-- <li class="px-2 ">
                               <a href="http://" class="text-black">
                                   ORDER TRACK
                               </a>
                           </li> --}}
                           <li class="bg-red px-2 rounded">
                               <a href="{{ route('frontend.cart.checkout') }}" class="text-white">
                                   CHECKOUT
                               </a>
                           </li>
                       </ul>
                       <div class="header-sub-1 nav-top-search-icon">
                           <form action="" method="post">
                               @csrf
                               <i class="fas fa-search fa-fw header-seach-icon" style="color:#EC268F"></i>
                               <input type="text" class="form-control" placeholder="Search Product"
                                   aria-label="Search" aria-describedby="basic-addon1">

                           </form>
                       </div>
                       <nav id="nav" class="navbar hide-navbar py-0 h-100 align-items-center">
                           <ul style="margin-right: 0px">
                               <li><a href="{{ route('frontend.index') }} "
                                       class=" {{ URL::current() == route('frontend.index') ? 'active-red' : '' }} text-capitalize">Home</a>
                               </li>
                               @foreach ($navCategories as $navCategory)
                                   <li class="nav-item dropdown">
                                       <a href="{{ route('frontend.cat.show', $navCategory->slug) }}"
                                           class="{{ URL::current() == route('frontend.cat.show', $navCategory->slug, $navCategory->slug) ? 'active-red' : '' }} nav-link text-capitalize">
                                           {{ $navCategory->name }}
                                       </a>
                                       <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                           <div class="text-capitalize p-2">
                                               @foreach ($navCategory->subCategories as $navSubCategory)
                                                   <a class="dropdown-item"
                                                       href="{{ route('frontend.sub-category.index', ['categorySlug' => $navCategory->slug, 'subCategorySlug' => $navSubCategory->slug]) }}">{{ $navSubCategory->name }}</a>
                                               @endforeach
                                               {{-- <a class="dropdown-item " href="#">Face wash</a>
                                               <a class="dropdown-item" href="#">Face Scrub</a>
                                               <a class="dropdown-item" href="#">Face Moisturiser</a>
                                               <a class="dropdown-item" href="#">Sheet Mask</a>
                                               <a class="dropdown-item" href="#">Face Serum</a>
                                               <a class="dropdown-item" href="#">Suncreen</a>
                                               <a class="dropdown-item" href="#">Face Mist</a> --}}
                                           </div>
                                       </div>
                                   </li>
                               @endforeach
                               {{-- <li class="nav-item dropdown">
                                   <a href="{{ route('frontend.cat.show', 'skin') }}"
                                       class="{{ URL::current() == route('frontend.cat.show', 'skin') ? 'active-red' : '' }} nav-link text-capitalize">
                                       Skin
                                   </a>
                                   <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                       <div class="text-capitalize p-2">
                                           <a class="dropdown-item " href="{{ url('sc/skin/face-wash') }}">Face
                                               wash</a>
                                           <a class="dropdown-item" href="{{ url('sc/skin/face-scrub') }}">Face
                                               Scrub</a>
                                           <a class="dropdown-item" href="{{ url('sc/skin/face-moisturiser') }}">Face
                                               Moisturiser</a>
                                           <a class="dropdown-item" href="{{ url('sc/skin/sheet-mask') }}">Sheet
                                               Mask</a>
                                           <a class="dropdown-item" href="{{ url('sc/skin/face-serum') }}">Face
                                               Serum</a>
                                           <a class="dropdown-item" href="{{ url('sc/skin/suncreen') }}">Suncreen</a>
                                           <a class="dropdown-item" href="{{ url('sc/skin/face-mist') }}">Face
                                               Mist</a>
                                       </div>
                                   </div>
                               </li>
                               <li class="nav-item dropdown">
                                   <a href="{{ route('frontend.cat.show', 'fragrances') }}"
                                       class="{{ URL::current() == route('frontend.cat.show', 'fragrances') ? 'active-red' : '' }} nav-link text-capitalize">
                                       Fragrances
                                   </a>
                                   <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                       <div class="text-capitalize">
                                           <a class="dropdown-item " href="{{ url('sc/fragrances/men') }}">Men</a>
                                           <a class="dropdown-item" href="{{ url('sc/fragrances/women') }}">Women</a>
                                       </div>
                                   </div>
                               </li>
                               <li class="nav-item dropdown">
                                   <a href="{{ route('frontend.cat.show', 'hair-care') }}"
                                       class="{{ URL::current() == route('frontend.cat.show', 'hair-care') ? 'active-red' : '' }} nav-link text-capitalize">
                                       Hair
                                       Care
                                   </a>
                                   <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                       <div class="text-capitalize">
                                           <a class="dropdown-item "
                                               href="{{ url('sc/hair-care/shampoo') }}">Shampoo</a>
                                           <a class="dropdown-item"
                                               href="{{ url('sc/hair-care/conditoner') }}">Conditoner</a>
                                           <a class="dropdown-item" href="{{ url('sc/hair-care/hair-mask') }}">Hair
                                               mask</a>
                                           <a class="dropdown-item" href="{{ url('sc/hair-care/hair-serum') }}">Hair
                                               serum</a>
                                           <a class="dropdown-item" href="{{ url('sc/hair-care/hair-oil') }}">Hair
                                               Oil</a>
                                           <a class="dropdown-item"
                                               href="{{ url('sc/hair-care/straigthner') }}">Straigthner</a>
                                           <a class="dropdown-item" href="{{ url('sc/hair-care/dryer') }}">Dryer</a>
                                           <a class="dropdown-item" href="{{ url('sc/hair-care/curler') }}">Curler</a>
                                           <a class="dropdown-item"
                                               href="{{ url('sc/hair-care/trimmers') }}">Trimmers</a>
                                       </div>
                                   </div>
                               </li>
                               <li class="nav-item dropdown">
                                   <a href="{{ route('frontend.cat.show', 'personal-care') }}"
                                       class="{{ URL::current() == route('frontend.cat.show', 'personal-care') ? 'active-red' : '' }} nav-link text-capitalize">
                                       Personal Care
                                   </a>
                                   <div class="dropdown-menu ">
                                       <div class="text-capitalize">
                                           <a class="dropdown-item " href="{{ url('sc/personal-care/shower-gel') }}">Shower
                                               Gel</a>
                                           <a class="dropdown-item" href="{{ url('sc/personal-care/body-scrub') }}">Body
                                               Scrub</a>
                                           <a class="dropdown-item" href="{{ url('sc/personal-care/body-lotion') }}">Body
                                               Lotion</a>
                                           <a class="dropdown-item" href="{{ url('sc/personal-care/hand-cream') }}">Hand
                                               Cream</a>
                                           <a class="dropdown-item" href="{{ url('sc/personal-care/hair-oil') }}">Hair
                                               Oil</a>
                                           <a class="dropdown-item" href="{{ url('sc/personal-care/foot-cream') }}">Foot
                                               Cream</a>
                                           <a class="dropdown-item" href="{{ url('sc/personal-care/body-butter') }}">Body
                                               Butter</a>
                                           <a class="dropdown-item" href="{{ url('sc/personal-care/soaps') }}">Soaps</a>
                                           <a class="dropdown-item" href="{{ url('sc/personal-care/hand-wash') }}">Hand
                                               wash</a>
                                       </div>
                                   </div>

                               </li>
                               <li class="nav-item dropdown">
                                   <a href="{{ route('frontend.cat.show', 'home-decor') }}"
                                       class="{{ URL::current() == route('frontend.cat.show', 'home-decor') ? 'active-red' : '' }} nav-link text-capitalize">
                                       Home Decor
                                   </a>
                                   <div class="dropdown-menu">
                                       <div class="text-capitalize">
                                           <a class="dropdown-item "
                                               href="{{ url('sc/home-decor/windchime') }}">Windchime</a>
                                           <a class="dropdown-item" href="{{ url('sc/home-decor/wall-decor') }}">Wall
                                               décor</a>
                                           <a class="dropdown-item" href="{{ url('sc/home-decor/wall-clock') }}">Wall
                                               Clock</a>
                                           <a class="dropdown-item" href="{{ url('sc/home-decor/table-piece') }}">Table
                                               Piece</a>
                                           <a class="dropdown-item" href="{{ url('sc/home-decor/table-clock') }}">Table
                                               Clock</a>
                                           <a class="dropdown-item"
                                               href="{{ url('sc/home-decor/planters') }}">Planters</a>
                                           <a class="dropdown-item" href="{{ url('sc/home-decor/key-holders') }}">Key
                                               Holders</a>
                                       </div>
                                   </div>
                               </li>
                               <li class="nav-item dropdown">
                                   <a href="{{ route('frontend.cat.show', 'gift') }}"
                                       class="{{ URL::current() == route('frontend.cat.show', 'gift') ? 'active-red' : '' }} nav-link text-capitalize">
                                       Gift
                                   </a>
                                   <div class="dropdown-menu">
                                       <div class="text-capitalize">
                                           <a class="dropdown-item " href="{{ url('sc/gift/school-stationery') }}">School
                                               Stationery</a>
                                           <a class="dropdown-item" href="{{ url('sc/gift/bobble-heads') }}">Bobble
                                               Heads</a>
                                           <a class="dropdown-item" href="{{ url('sc/gift/action-figures') }}">Action
                                               Figures</a>
                                           <a class="dropdown-item"
                                               href="{{ url('sc/gift/keychains') }}">Keychains</a>
                                       </div>
                                   </div>
                               </li> --}}
                           </ul>
                       </nav>
                   </div>
               </div>
           </div>
       </div>
       <div class="d-lg-none d-block bg-white pb-3">
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
                   <div class="col">
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
                       <div class="input-group mt-3">
                           <input type="text" class="form-control" placeholder="Search for products"
                               aria-label="Search for products" aria-describedby="button-addon2">
                           <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                   class="fas fa-search"></i></button>
                       </div>
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
                                   Log in/Create Account
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
                                   <div class="row justify-content-center mx-auto">
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
                                   </div>
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
                                   @if ($errors->has('otp'))
                                       <span class="text-danger">{{ $errors->first('otp') }}</span>
                                   @endif
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
                               Snackbar.show({
                                   text: "Something Went Wrong",
                                   pos: 'top-right',
                                   actionTextColor: '#fff',
                                   backgroundColor: '#e7515a'
                               });
                           });
                   },
                   resend() {
                       this.timer = 30;
                       this.sendOtp();
                   },
                   otpNew() {
                       //    $('#otpNew').focus();
                   },
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
