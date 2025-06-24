<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Channel</title>
    @stack('meta')
    @include('frontend.layouts.header')
    @yield('cdn')
    <script src="{{ asset('frontend/js/axios.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vue.min.js') }}"></script>
    {{-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> --}}
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N7LWYVN9N2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-N7LWYVN9N2');
    </script>
</head>

<body>
    <div id="wrapper">
        <div class="w1">

            @php
                $user = auth()->user();
                if ($user) {
                    $cart = $user->cart;
                } else {
                    $cart_session_id = session()->get('cart_session_id');
                    $cart = $cart_session_id ? App\Models\Cart::where('session_id', $cart_session_id)->first() : null;
                }
                $cartItemsCount = $cart ? $cart->items()->count() : 0;
                $navCategories = App\Models\Category::with('subCategories')
                    ->limit(7)
                    ->get();
                //    dd($navCategories);
            @endphp

            @include('frontend.layouts.nav')
            <main id="mt-main">
                @yield('content')
            </main>
            @include('frontend.layouts.footer')
        </div>
    </div>
    <!-- include jQuery -->
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <!-- include jQuery -->
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <!-- include jQuery -->
    <script src="{{ asset('frontend/js/jquery.main.js') }}"></script>

    {{-- <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="{{ asset('frontend/js/fontawesome.min.js') }}"></script>

    <script src="{{ asset('frontend/js/aos.js') }}"></script>

    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/jquery.min.js') }}"></script> --}}

    <script>
        AOS.init();
    </script>
    @yield('js')

</body>

</html>
