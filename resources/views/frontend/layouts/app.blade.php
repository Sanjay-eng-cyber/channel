<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Channel</title>
    @include('frontend.layouts.header')
    @yield('cdn')
    <script src="{{ asset('frontend/js/axios.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vue.min.js') }}"></script>
    {{-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> --}}
</head>

<body>
    <div id="wrapper">
        <div class="w1">
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

    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/fontawesome.min.js') }}"></script>

    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    @yield('js')

</body>

</html>
