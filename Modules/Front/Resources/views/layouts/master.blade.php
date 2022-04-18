<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ cache('favicon') }}" type="image/png" />

    @stack("meta")

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/front/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/swiper.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/splide.min.css"
        integrity="sha256-6YrKt7vMU9e4bwtlblASqhvvEt4/0JEQJ/zyWOFKnaM=" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/rosalia_express.css') }}">
    @livewireStyles

    @stack("style")
    <title>{{ cache('app_name') }} | @yield(' title')</title>
</head>

<body>
    <x-front.navbar />
    <x-front.sidebar />

    <div>
        @yield('content')
    </div>

    <x-front.footer />

    <!-- JS FILES -->
    <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/scripts.js') }}"></script>
    <script src="{{asset('assets/front/js/rosalia_express.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"
        integrity="sha256-bPFHGtlzinBbML+yf5JBexDq8KynAuUMXc3ksBY9Eyo=" crossorigin="anonymous"></script>
    @livewireScripts

    @stack("script")
</body>

</html>
