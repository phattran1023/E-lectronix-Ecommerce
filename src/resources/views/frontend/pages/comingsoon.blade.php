@extends('layouts.app')

@section('title', 'Commingsoon ...')

@section('content')


    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bgimg {
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
            color: white;
            font-family: "Courier New", Courier, monospace;
            font-size: 25px;
        }

        .topleft {
            position: absolute;
            top: 0;
            left: 16px;
        }

        .bottomleft {
            position: absolute;
            bottom: 0;
            left: 16px;
        }

        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        hr {
            margin: auto;
            width: 40%;
        }
    </style>

    <body>
        <div class="bgimg">

            <img src="{{ asset('assets/img/forestbridge.jpg') }}" class="bgimg" width="100%">

            <div class="middle">
                <h1>COMING SOON</h1>
                <hr>
                <div id="countDownTime" class="tex-center font-weight-light" style="font-size: 1.5rem; color:#ffffff">
                </div>
            </div>

        </div>
    </body>


    @push('scripts')
        <script>
            var countDownDate = new Date("September 3, 2023 15:30:00").getTime();

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
