@extends('layouts.app')

@section('title', 'Orders List')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Order ID</th>
                                    <th>Tracking No.</th>
                                    <th>Username</th>
                                    <th>Payment Method</th>
                                    <th>Ordered Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $item )
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->tracking_no}}</td>
                                            <td>{{$item->fullname}}</td>
                                            <td>{{$item->payment_mode}}</td>
                                            <td>{{$item->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                @if ($item->status_message == 'In Progress...')
                                                    <span class="badge rounded-pill bg-primary">In Progress...</span>
                                                @elseif ($item->status_message == 'completed')
                                                    <span class="badge rounded-pill bg-success">Completed</span>
                                                @elseif ($item->status_message == 'pending')
                                                    <span class="badge rounded-pill bg-warning text-dark">Pending</span>
                                                @elseif ($item->status_message == 'cancelled')
                                                    <span class="badge rounded-pill bg-danger">Cancelled</span>
                                                @elseif ($item->status_message == 'out-for-delivery')
                                                    <span class="badge rounded-pill bg-info text-dark">Out for Delivery</span>
                                                @else
                                                    {{ $item->status_message }} <!-- Display the status message as text if it doesn't match any of the above values -->
                                                @endif
                                            </td>
                                            <td><a href="{{ url('orders/'.$item->id)}}" class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No orders available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{$orders -> links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
