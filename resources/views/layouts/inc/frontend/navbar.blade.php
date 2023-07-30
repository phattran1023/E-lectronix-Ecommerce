<!-- Jumbotron -->
<div class="p-3 text-center bg-white border-bottom">
    <div class="container">
        <div class="row gy-3">
            <!-- Left elements -->
            <div class="col-lg-2 col-sm-4 col-4">
                <a href="{{route('homepage')}}"><h5 class="float-start">My Shopping Site</h5></a>
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                <div class="d-flex float-end">
                    <a href="{{url('cart')}}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank"> 
                        <i class="fa fa-shopping-cart m-1 me-md-2"></i>
                        <p class="d-none d-md-block mb-0">My cart 
                            <span id="spanCount"><livewire:frontend.cart.cart-count/></span>
                        </p> 
                    </a>
                    <a href="{{url('wishlist')}}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank"> 
                        <i class="fa fa-heart m-1 me-md-2"></i>
                        <p class="d-none d-md-block mb-0">Wishlist(<livewire:frontend.wishlist-count/>)</p> 
                    </a>
                    @guest
                        @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank">
                                    <i class="fa fa-user-alt m-1 me-md-2"></i>
                                    <p class="d-none d-md-block mb-0">{{ __('Login') }}</p> 
                                </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" target="_blank"> 
                                <i class="fa fa-user-alt m-1 me-md-2"></i>
                                <p class="d-none d-md-block mb-0">{{ __('Register') }}</p> 
                            </a>
                        @endif
                    @else
                        <li class="nav-item dropdown" style="list-style: none">
                            <a class="nav-link dropdown-toggle me-1 border rounded py-1 px-3 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user m-1 me-md-2"></i> 
                                <p class="d-none d-md-block mb-0">{{ Auth::user()->name }}</p> 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
                                        Cart</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </div>
            </div>
            <!-- Center elements -->

            <!-- Right elements -->
            <div class="col-lg-5 col-md-12 col-12">
                <div class="input-group float-center">
                    <form action="" role="search"></form>
                    <input type="search" id="form1" class="form-control" placeholder="Search..." />
                    <button type="button" class="btn btn-primary shadow-0 col-md-2">
                    <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <!-- Right elements -->
        </div>
    </div>
</div>
<!-- Jumbotron -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f5f5f5;">
        <!-- Container wrapper -->
        <div class="container justify-content-center justify-content-md-between">
        <!-- Toggle button -->
        <button
                class="navbar-toggler border text-dark py-2"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarLeftAlignExample"
                aria-controls="navbarLeftAlignExample"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{url('/collections')}}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{url('/new-arrivals')}}">New Arrivals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Featured Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Electronics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Fashions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Accessories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">coupon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">About us</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->