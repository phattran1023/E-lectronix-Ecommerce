@extends('layouts.app')

@section('title', 'Home page')

@section('content')
    @include('layouts.inc.frontend.carousel')

    @include('layouts.inc.frontend.main')
    @push('scripts')
        <script>
            var countDownDate = new Date("September 19, 2023 15:30:00").getTime();

            var countdownfunction = setInterval(function() {

                var now = new Date().getTime();

                var distance = countDownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("countDownTime").innerHTML = days + "d " + hours + "h " +
                    minutes + "m " + seconds + "s ";

                if (distance < 0) {
                    clearInterval(countdownfunction);
                    document.getElementById("countDownTime").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    @endpush

@endsection


@section('script')
    <script>
        $('.trending-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
