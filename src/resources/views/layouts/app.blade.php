<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>
    <link rel="icon" type="image/x-icon"
        href="{{ asset('assets/img/kisspng-letter-computer-icons-letter-e-5abfa798001415.6134645015225097200004.png') }}">

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Shop Project">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        .chatBox {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 300px;
            z-index: 99;
            width: 500px;
            max-height: 500px;
            /* Giới hạn chiều cao tối đa */
            background-color: #fad3fc;
            color: #090704;
            border: none;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            font-size: 24px;
            overflow-y: auto;
            /* Thêm thanh cuộn nếu nội dung vượt quá giới hạn */
            display: flex;
            transition: background-color 0.3s;
        }

        .chat-message {
            background-color: #0084ff;
            /* Màu nền cho tin nhắn */
            color: #fff;
            /* Màu văn bản */
            padding: 10px;
            /* Khoảng cách padding xung quanh tin nhắn */
            margin-bottom: 10px;
            /* Khoảng cách giữa các tin nhắn */
            border-radius: 8px;
            /* Độ cong viền */
            max-width: 80%;
            /* Chiều rộng tối đa của tin nhắn để nó không quá rộng */
        }

        .input-container {
            position: relative;
        }

    

        .chat-input {
            padding-left: 30px;
            /* Khoảng cách để biểu tượng không bị che khuất */
        }

        .message {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 100px;
            z-index: 99;
            width: 60px;
            height: 60px;
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
        <div id="chat-box" style="display: none;" class="chatBox">
            <div class="chat-messages">
                <!-- Tin nhắn 1 -->
                <div class="chat-message">Người dùng A: Xin chào!</div>
                <!-- Tin nhắn 2 -->
                <div class="chat-message user-message">Người dùng B: Chào bạn! Có gì mới?</div>
                <!-- Tin nhắn 3 -->
                <div class="chat-message">Người dùng A: Tôi cần giúp đỡ về điều này.</div>
                <!-- Tin nhắn 4 -->
                <div class="chat-message user-message">Người dùng B: Tất nhiên, hãy hỏi đi.</div>
                <!-- Tin nhắn 1 -->
                <div class="chat-message">Người dùng A: Xin chào!</div>
                <!-- Tin nhắn 2 -->
                <div class="chat-message user-message">Người dùng B: Chào bạn! Có gì mới?</div>
                <!-- Tin nhắn 3 -->
                <div class="chat-message">Người dùng A: Tôi cần giúp đỡ về điều này.</div>
                <!-- Tin nhắn 4 -->
                <div class="chat-message user-message">Người dùng B: Tất nhiên, hãy hỏi đi.</div>
                <!-- Tin nhắn 1 -->
                <div class="chat-message">Người dùng A: Xin chào!</div>
                <!-- Tin nhắn 2 -->
                <div class="chat-message user-message">Người dùng B: Chào bạn! Có gì mới?</div>
                <!-- Tin nhắn 3 -->
                <div class="chat-message">Người dùng A: Tôi cần giúp đỡ về điều này.</div>
                <!-- Tin nhắn 4 -->
                <div class="chat-message user-message">Người dùng B: Tất nhiên, hãy hỏi đi.</div>

                <div class="fixed-input">
                    <span class="input-icon"><i class="fas fa-envelope"></i></span>
                    <input type="text" id="message-input" class="chat-input" placeholder="Type your message...">
                </div>
            </div>


        </div>
        <button class="message" id="message-button">
            <i class="fas fa-comments"></i>
        </button>
        <button id="backToTopBtn" class="back-to-top">
            <span>&#8593;</span>
        </button>
    </div>
    @include('layouts.inc.frontend.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
    <script>
        $(document).ready(function() {
            // Xác định nút "Message" và bản chat
            var messageButton = $("#message-button");
            var chatBox = $("#chat-box");

            // Sự kiện click cho nút "Message"
            messageButton.click(function() {
                // Hiển thị hoặc ẩn bản chat tùy thuộc vào trạng thái hiện tại
                chatBox.toggle();
            });
        });
    </script>
    {{-- Reset scrollbar --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script> --}}


    {{-- Back to top --}}
    <script>
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
    {{-- Comment --}}

    @yield('reportComment')
    @yield('countMaximumWords')
    @yield('commentReply')
    @yield('elseBtn')
    @yield('commitReport')
    @yield('likeBtn')
    @yield('ReplyLikeBtn');

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "122109060080000551");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v17.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</body>

</html>
