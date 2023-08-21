<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <a class="text-decoration-none" href="{{ route('homepage') }}">
                        <div>
                            
                            <h3 class="brand-name"><img src="{{ asset('assets/img/kisspng-letter-computer-icons-letter-e-5abfa798001415.6134645015225097200004.png') }}"
                                width="45px" alt="">{{ $appSetting->website_name ?? 'Not found' }}</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-5 my-auto">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ Request::get('search') }}"
                                placeholder="Search your product" class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cart') }}">
                                <i class="fa fa-shopping-cart"></i> Cart (<livewire:frontend.cart.cart-count />)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('wishlist') }}">
                                <i class="fa fa-heart"></i> Wishlist (<livewire:frontend.wishlist-count />)
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (session('avatar'))
                                        <img src="{{session('avatar')}}" alt="" width="30px" style="border-radius:  50%">
                                    @else
                                        <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}" width="30px" style="border-radius:  50%">
                                    @endif
                                    {{-- @if (empty(Auth::user()->userAvatar))
                                        <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}"
                                            width="30px" style="border-radius:  50%">
                                    @endif {{ Auth::user()->name }} --}}
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (empty(Auth::user()->userAvatar))
                                        <li>

                                        <li><a class="dropdown-item bg-warning" href="#" data-toggle="modal"
                                                data-target=".bs-example-modal-sm">Change avatar</a>
                                        </li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ url('profile') }}"><i class="fa fa-user"></i>
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ url('orders') }}"><i class="fa fa-list"></i> My
                                            Orders</a>
                                    </li>
                                    <!-- Check if the user is an admin (role_as == '1') -->
                                    @if (Auth::user()->role_as == '1')
                                        <!-- Display "Admin Panel" link for admins -->
                                        <li><a class="dropdown-item" href="{{ url('admin/dashboard') }}"><i
                                                    class="fa fa-list"></i> Admin Panel</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
                                            Cart</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{Route('coupon.couponUser')}}"><i class="fas fa-gift"></i> Coupon</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Menu
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections') }}">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/new-arrivals') }}">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('featured-products') }}">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('comingsoon') }}">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('comingsoon') }}">Fashions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('comingsoon') }}">Accessories</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
</div>
