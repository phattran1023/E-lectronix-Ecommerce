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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">


    <!-- CSS Alaertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />


    @livewireStyles
</head>

<body>
    @include('layouts.inc.frontend.header')
    <div id="app">

        @include('layouts.inc.frontend.navbar')

        <main>
            @yield('content')
        </main>
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
        alertify.defaults.notifier.delay = 3;

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

    @livewireScripts
    @stack('scripts')
</body>

</html>
