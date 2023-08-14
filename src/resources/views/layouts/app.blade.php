<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Shop Project">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

    {{-- Exzoom product image --}}
    <link rel="stylesheet" href="{{ asset('assets/exzoom/jquery.exzoom.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">


    <!-- CSS Alaertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <style>
        /* styles.css */
        .back-to-top {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            width: 50px;
            height: 50px;
            background-color: #6868d8;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s;
        }

        .back-to-top:hover {
            background-color: #0056b3;
        }
    </style>
    @livewireStyles
</head>

<body>
    @include('layouts.inc.frontend.header')
    <div id="app">

        @include('layouts.inc.frontend.navbar')

        <main>
            @yield('content')
        </main>
        <button id="backToTopBtn" class="back-to-top">
            <span>&#8593;</span>
        </button>
    </div>
    @include('layouts.inc.frontend.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom.js')}}"></script> --}}

    <!-- JavaScript Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        // Set the notifier defaults before any alerts are shown
        alertify.defaults.notifier.position = 'top-right';
        alertify.defaults.notifier.delay = 5;

        window.addEventListener('message', event => {
            // Get the alert type from the event details
            let alertType = event.detail.type;

            switch (alertType) {
                case 'success':
                    alertify.success(event.detail.text);
                    break;
                case 'warning':
                    alertify.warning(event.detail.text);
                    break;
                case 'info':
                    alertify.message(event.detail.text);
                    break;
                case 'error':
                    alertify.error(event.detail.text);
                    break;
                default:
                    alertify.log(event.detail.text);
                    break;
            }
        });
    </script>

    {{-- Reset scrollbar --}}
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

    <script>
        // script.js
        document.addEventListener("DOMContentLoaded", function() {
            const backToTopButton = document.getElementById("backToTopBtn");

            window.addEventListener("scroll", () => {
                if (window.scrollY > 100) {
                    backToTopButton.style.display = "block";
                } else {
                    backToTopButton.style.display = "none";
                }
            });

            backToTopButton.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        });
    </script>
    {{-- Owl Script --}}
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>



    {{-- Trending carousel --}}
    @yield('script')


    @livewireScripts
    {{-- Alertify vs Exzoom --}}
    @stack('scripts')
    @yield('commentScript')
</body>

</html>
