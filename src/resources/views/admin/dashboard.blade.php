@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif
            <div class="me-md-3 me-xl-5">
                <h2>Welcome</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for=""><a href="{{url('admin/products')}}" class="text-white">Total Products</a></label>
                        <h1>{{$totalProducts}}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for=""><a href="{{url('admin/orders')}}" class="text-white">Total Orders</a></label>
                        <h1>{{$totalOrders}}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for=""><a href="{{url('admin/categories')}}" class="text-white">Total Categories</a></label>
                        <h1>{{$totalCategories}}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label for=""><a href="{{url('admin/brands')}}" class="text-white">Total Brands</a></label>
                        <h1>{{$totalBrands}}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-dark mb-3">
                        <label for=""><a href="{{url('admin/users')}}" class="text-dark">Total Users</a></label>
                        <h1>{{$totalUsers}}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-info text-dark mb-3">
                        <label for=""><a href="{{url('admin/orders')}}" class="text-dark">Today Orders</a></label>
                        <h1>{{$todayOrders}}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-light text-dark mb-3">
                        <label for=""><a href="{{url('admin/orders')}}" class="text-dark">Month Orders</a></label>
                        <h1>{{$monthOrders}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
