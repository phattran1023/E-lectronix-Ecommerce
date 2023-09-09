<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('categoryIndex')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Categories Management</span>
        </a>
      </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('brandIndex') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Brands Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('colorIndex') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Color</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Add Category</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categoryIndex') }}">View Categories</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                aria-controls="ui-basic2">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create') }}">Add Product</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">View Product</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi menu-icon mdi-television-classic"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{url('admin/users/create')}}"> Add user </a></li> --}}
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/users/')}}"> View user </a></li>
                    
                    </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{url('admin/users/create')}}"> Add user </a></li> --}}
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/comments/')}}"> Reported comments </a></li>
                    
                    </li>
                </ul>
            </div>
        </li>
        
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="{{ url('admin/coupon') }}" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-gift menu-icon"></i>
                <span class="menu-title">Coupon</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('coupon.index') }}">View Coupon</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('coupon.add') }}">add Coupon</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/coupon') }}">
                <i class="mdi mdi-gift menu-icon"></i>
                <span class="menu-title">Coupon</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/survey') }}">
                <i class="mdi mdi-rename-box menu-icon"></i>
                <span class="menu-title">Survey</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/settings') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site setting</span>
            </a>
        </li>
    </ul>
</nav>
