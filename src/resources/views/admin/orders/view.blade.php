@extends('layouts.admin')

@section('title', 'Orders Details')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Order Details
                        @php
                        $date = Request::get('date');
                        $previousDate = \Carbon\Carbon::parse($date)->format('Y-m-d');
                    @endphp
                    
                        <a href="{{ url('admin/orders?date=' . $previousDate . '&status=') }}" class="btn btn-danger btn-sm float-end mx-1">Back</a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">Download Invoice</a>
                        <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">View Invoice</a>
                    </h4>
                    
                </div>
                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart"></i>My Order Details
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $order->id }}</h6>
                            <h6>Tracking Id/No.: {{ $order->tracking_no }}</h6>
                            <h6>Order Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">Order Status Message: <span
                                    class="text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full name: {{ $order->fullname }}</h6>
                            <h6>Email: {{ $order->email }}</h6>
                            <h6>Phone: {{ $order->phone }}</h6>
                            <h6>Address: {{ $order->address }}</h6>
                            <h6>Pincode: {{ $order->pincode }}</h6>
                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>
                    <hr>


                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Item ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        {{-- Item id --}}
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        {{-- Image --}}
                                        <td width="10%">
                                            @if ($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                    style="width: 70px; height: 50px; border-radius:0;" alt="">
                                            @else
                                                <img src="" style="width: 70px; height: 50px" alt="">
                                            @endif
                                        </td>
                                        {{-- Product --}}
                                        <td>
                                            {{ $orderItem->product->name }}
                                            @if ($orderItem->productColor)
                                                <br>
                                                @if ($orderItem->productColor->color)
                                                    <span>With color:<span class="color-square d-inline"
                                                            style="color: {{ $orderItem->productColor->color->name }};">
                                                            &#9632; {{ $orderItem->productColor->color->name }}
                                                        </span>
                                                    </span>
                                                @endif
                                            @endif
                                        </td>
                                        {{-- Price --}}
                                        <td width="10%">{{ number_format($orderItem->price) }} đ</td>
                                        {{-- Quantity --}}
                                        <td width="10%">{{ $orderItem->quantity }}</td>
                                        {{-- Total --}}
                                        <td width="10%" class="fw-bold">
                                            {{ number_format($orderItem->quantity * $orderItem->price) }} đ</td>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp

                                    </tr>
                                @endforeach
                                @if ($couponOrder!==null)
                                    <tr>
                                        <td colspan="5" class="fw-light">Total Products Amount </td>
                                        <td colspan="1" class="fw-light">{{ number_format($totalPrice) }} đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="fw-light">Total Discount Amount(Coupon Code: {{$couponOrder->code}}) </td>
                                        <td colspan="1" class="fw-light">{{ number_format($couponOrder->discount_amount) }} đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount </td>
                                        <td colspan="1" class="fw-bold">{{ number_format($totalPrice - $couponOrder->discount_amount) }} đ</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount </td>
                                        <td colspan="1" class="fw-bold">{{ number_format($totalPrice) }} đ</td>
                                    </tr>
                                @endif
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Update Order Status)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{url('admin/orders/'.$order->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Update Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">- -All Order Status- -</option>
                                        <option value="In Progress..." {{ Request::get('status') == 'In Progress...' ? 'selected' : ''}} >In progress</option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : ''}} >Completed</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : ''}} >Pending</option>
                                        <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : ''}} >Cancelled</option>
                                        <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : ''}} >Out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>  
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3">Order Status: <span class="text-uppercase">{{$order->status_message}}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
