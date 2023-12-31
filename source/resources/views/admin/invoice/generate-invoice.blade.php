<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #c41818;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">E-lectronix.com</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{ $order->id }}</span> <br>
                    <span>Date: {{ date('d / m / Y')}}</span> <br>
                    <span>Zip code : 00700</span> <br>
                    <span>Address: 391A Nam Kỳ Khởi Nghĩa, Võ Thị Sáu, Quận 3, HCM</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $order->id }}</td>

                <td>Full Name:</td>
                <td>{{ $order->fullname }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{ $order->tracking_no }}</td>


                <td>Email Id:</td>
                <td>{{ $order->email }}</td>

            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>

                <td>Phone:</td>
                <td>{{ $order->phone }}</td>

            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{ $order->payment_mode }}</td>


                <td>Address:</td>
                <td>{{ $order->address }}</td>

            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{ $order->status_message }}</td>


                <td>Pin code:</td>
                <td>{{ $order->pincode }}</td>

            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>No.</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalPrice = 0;
            $id =0;
        @endphp
        @foreach ($order->orderItems as $orderItem)
            
            <tr>
                {{-- Item id --}}
                <td width="10%">{{ $id +=1 }}</td>
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
                <td width="15%" class="fw-bold">
                    {{ number_format($orderItem->quantity * $orderItem->price) }} đ</td>
                @php
                    $totalPrice += $orderItem->quantity * $orderItem->price;
                @endphp

            </tr>
        @endforeach
        @if ($couponOrder!=null)
            <tr>
                <td colspan="4" class="fw-light">Total Products Amount </td>
                <td colspan="1" class="fw-light">{{ number_format($totalPrice) }} đ</td>
            </tr>
            <tr>
                <td colspan="4" class="fw-light">Total Discount Amount(Coupon Code: {{$couponOrder->code}}) </td>
                <td colspan="1" class="fw-light">{{ number_format($couponOrder->discount_amount) }} đ</td>
            </tr>
            <tr>
                <td colspan="4" class="total-heading">Total Amount </td>
                <td colspan="1" class="total-heading">{{ number_format($totalPrice - ($couponOrder->discount_amount)) }} đ</td>
            </tr>
        @else 
            <tr>
                <td colspan="4" class="total-heading">Total Amount </td>
                <td colspan="1" class="total-heading">{{ number_format($totalPrice) }} đ</td>
            </tr> 
        @endif
        
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with E-lectronix.com
    </p>

</body>
</html>