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
                        <label for=""><a href="{{ url('admin/products') }}" class="text-white">Total
                                Products</a></label>
                        <h1>{{ $totalProducts }}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for=""><a href="{{ url('admin/orders') }}" class="text-white">Total
                                Orders</a></label>
                        <h1>{{ $totalOrders }}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for=""><a href="{{ url('admin/categories') }}" class="text-white">Total
                                Categories</a></label>
                        <h1>{{ $totalCategories }}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label for=""><a href="{{ url('admin/brands') }}" class="text-white">Total
                                Brands</a></label>
                        <h1>{{ $totalBrands }}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-dark mb-3">
                        <label for=""><a href="{{ url('admin/users') }}" class="text-dark">Total Users</a></label>
                        <h1>{{ $totalUsers }}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-info text-dark mb-3">
                        <label for=""><a href="{{ url('admin/orders') }}" class="text-dark">Today
                                Orders</a></label>
                        <h1>{{ $todayOrders }}</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-light text-dark mb-3">
                        <label for=""><a href="{{ url('admin/orders') }}" class="text-dark">Month
                                Orders</a></label>
                        <h1>{{ $monthOrders }}</h1>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                {{-- chart 1 --}}
                <div class="col-md-6 ">
                    <h3 class="text-center">Order of each month</h3>
                    <canvas id="ordersChart"></canvas>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var ctx = document.getElementById('ordersChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: {!! json_encode($chartData['labels']) !!},
                                datasets: [{
                                    label: 'Number of Orders each month',
                                    data: {!! json_encode($chartData['values']) !!},
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgb(255, 0, 0)',
                                    borderWidth: 3
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            fontSize: 12 // Kích thước chữ trục y
                                        }
                                    },
                                    x: {
                                        ticks: {
                                            fontSize: 12 // Kích thước chữ trục y
                                        }
                                    }
                                },
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    // title: {
                                    //     display: true,
                                    //     text: 'Order By Month',
                                    //     color: 'black',
                                    // }
                                }
                            }
                        });
                    </script>
                </div>

                {{-- chart 2 --}}
                <div class="col-md-6">
                    <h3 class="text-center">Product of each Brands</h3>

                    <canvas id="brandProductChart"></canvas>
                    <script>
                        var brandLabels = {!! json_encode($chartData['brandLabels']) !!};
                        var brandData = {!! json_encode($chartData['brandData']) !!};

                        var ctx = document.getElementById('brandProductChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: brandLabels,
                                datasets: [{
                                    label: 'Number of Products',
                                    data: brandData,
                                    backgroundColor: 'rgb(0, 255, 0)',
                                    borderColor: 'rgb(0, 255, 0)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>

            </div>
            <br><br><br><br><hr>
            
            <div class="row justify-content-center">
                {{-- Revenue chart --}}
                <div class="col-md-8">
                    <h2 class="text-center">Revenue By Month</h2>

                    <canvas id="revenueChart"></canvas>
                    <script>
                        var revenueLabels = {!! json_encode($chartData['revenueLabels']) !!};
                        var revenueData = {!! json_encode($chartData['revenueData']) !!};
                    
                        var ctx = document.getElementById('revenueChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: revenueLabels,
                                datasets: [{
                                    label: 'Revenue',
                                    data: revenueData,
                                    backgroundColor: 'rgb(0, 0, 255)',
                                    borderColor: 'rgb(0, 0, 255)',
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: false
                                    }
                                }
                            }
                        });
                    </script>

                </div>

                {{-- User chart --}}
                <div class="col-md-4">
                    <h2 class="text-center">Number of User</h2>
                    <canvas id="roleChart"></canvas>
                    <script>
                        var roleLabels = {!! json_encode($chartData['roleLabels']) !!};
                        var roleData = {!! json_encode($chartData['roleData']) !!};
                    
                        var ctx = document.getElementById('roleChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'polarArea',
                            data: {
                                labels: roleLabels,
                                datasets: [{
                                    data: roleData,
                                    backgroundColor: [
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                    ],
                                    borderColor: [
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(255, 99, 132, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {}
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
