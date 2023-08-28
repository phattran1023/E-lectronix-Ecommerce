@extends('layouts.admin')

@section('title', 'Admin Coupon List')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .gift-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gift-box {
            width: 100px;
            height: 100px;
            background-color: #f0ad4e;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .gift-box.open {
            background-color: #e74c3c;
            transform: rotateY(180deg);
        }

        .gift-icon,
        .open-icon {
            font-size: 40px;
            color: white;
            transition: opacity 0.3s ease-in-out;
        }

        .open-icon {
            opacity: 0;
            position: absolute;
        }

        .content-wrapper {
            padding: 0 !important;
        }

        .table {
            margin: 0 !important;
        }
    </style>

    <div class="mt-3 mx-5">
        <h2 class="text-center">Coupon list</h2>
        <hr class="hr" />
        @if (session('message'))
            <div class="alert alert-success">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col">
                <a href="{{ Route('coupon.add') }}" class="btn btn-success btn-lg ">Add Coupon</a>
            </div>
            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#sendToSurvey">Send to Survey</button>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#topBuyersModal">Send to Top Buyers</button>
            </div>
        </div>
        <hr class="hr" />
        <table class="table table-striped table-hover" id="couponTable" style="width:100%; padding:0;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th style="width:100%">Code</th>
                    {{-- <th>Applies</th> --}}
                    {{-- <th>Type</th> --}}
                    <th>Value</th>
                    <th>Max Value</th>
                    <th>Description</th>
                    <th>Date Created</th>
                    <th>Date Expires</th>
                    <th>Status</th>
                    {{-- <th colspan="3" class="text-center">Aplication</th> --}}
                    <th>Aplication</th>
                    <th>Aplication</th>
                    <th>Aplication</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->code }}</td>
                        {{-- <td>{{ $coupon->applies }}</td> --}}
                        {{-- <td>{{$coupon->type=="percent"?"%":"VND"}}</td> --}}
                        <td>{{ $coupon->type == 'percent' ? $coupon->value . '%' : $coupon->value . 'VND' }}</td>
                        <td>{{ $coupon->max_value . 'VND' }}</td>
                        <td>{{ $coupon->description }}</td>
                        <td>{{ $coupon->date_created }}</td>
                        <td><span class="badge rounded-pill
                            @if (Carbon\Carbon::parse($coupon->date_expires)->isPast()) 
                                bg-danger
                            @elseif(Carbon\Carbon::parse($coupon->date_expires)->diffInDays(now()) < 3) 
                                bg-warning
                            @else
                                bg-success
                            @endif
                            ">{{ $coupon->date_expires }}</span></td>
                        <td>{{ $coupon->status == 'free' ? 'Free' : $coupon->status }}</td>
                        <td><a href="{{ Route('coupon.edit', $coupon) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ Route('coupon.delete', $coupon->id) }}" class="btn btn-danger">Delete</a></td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-coupon-code="{{ $coupon->code }}">
                                Send
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $coupons->links() }} --}}
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('coupon.send') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="sendCodeInput" id="sendCodeInput">
                        <p style="font-size: 14pt"><b>Coupon Code: </b><span id="couponCodePlaceholder"></span></p>
                        <label for="id" class="form-label text-center text-bold">Choose User from the list:</label>
                        <input class="form-control" list="ids" name="id" id="id">
                        <datalist id="ids">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->id }} | {{ $user->name }}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The TopbuyersModal -->
    <div class="modal fade" id="topBuyersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('coupon.sendToAll') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <table class="table table-striped table-hover" id="couponTable" style="width:100%; padding:0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Total Purchase</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topBuyers as $buyer)
                                    <tr>
                                        <td>{{ $buyer->user_id }}</td>
                                        <td>{{ $buyer->user_name }}</td>
                                        <td>{{ $buyer->total_purchase }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <div class="row col-12">
                            <div class="col-9">
                                <select class="form-select" name="selectCoupon">
                                    @foreach ($couponGroups as $couponGroupsItem)
                                        <option value="{{$couponGroupsItem->description}}">{{$couponGroupsItem->description}}|({{$couponGroupsItem->count}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary">Send All</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The sendToSurvey -->
    <div class="modal fade" id="sendToSurvey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send to Survey</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('coupon.sendToSurvey') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <select class="form-select" name="selectCoupon">
                            @foreach ($couponGroups as $couponGroupsItem)
                                <option value="{{$couponGroupsItem->description}}">{{$couponGroupsItem->description}}|({{$couponGroupsItem->count}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <div class="row col-12">
                            <button type="submit" class="btn btn-primary">Send All</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('button[data-bs-target="#myModal"]').on('click', function() {
                var sendCode = $(this).data('coupon-code');
                $('#couponCodePlaceholder').text(sendCode);
                $('#sendCodeInput').val(sendCode);
            });
        });
    </script>
    <script>
        // new DataTable('#couponTable');
        let table = new DataTable('#couponTable');

        table.on('click', 'tbody tr', function() {
            let data = table.row(this).data();

            alert('Coupon ID ' + data[0] + "'s row");
        });
    </script>
@endsection
