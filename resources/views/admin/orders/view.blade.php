@extends('layouts.admin')

@section('title', 'Orders Details')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4>Order Details</h4>
                </div>
                <div class="card-body">

                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart"></i>My Order Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end">Back</a>
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
                                                    style="width: 70px; height: 50px" alt="">
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
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount</td>
                                    <td colspan="1" class="fw-bold">{{ number_format($totalPrice) }} đ</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
