@extends('layouts.admin')

@section('title', 'Admin Orders List')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Filter By Date</label>
                                <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">Filter By Status</label>
                                <select  name="status" id="" class="form-select">
                                    <option value="">- -All- -</option>
                                    <option value="In Progress..." {{ Request::get('status') == 'In Progress...' ? 'selected' : ''}} >In progress</option>
                                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : ''}} >Completed</option>
                                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : ''}} >Pending</option>
                                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : ''}} >Cancelled</option>
                                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : ''}} >Out for delivery</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped">
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
                                @forelse ($orders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->payment_mode }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
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
                                        
                                        <td>
                                            <a href="{{ url('admin/orders/' . $item->id) . '?date=' . Request::get('date') }}" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                        
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No orders available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{-- {{ $orders->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>
@endsection
