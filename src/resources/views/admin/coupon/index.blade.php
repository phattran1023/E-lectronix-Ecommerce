@extends('layouts.app')

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

        .gift-icon, .open-icon {
            font-size: 40px;
            color: white;
            transition: opacity 0.3s ease-in-out;
        }

        .open-icon {
            opacity: 0;
            position: absolute;
        }
    </style>

    <div class="container mt-3">
    <h2 class="text-center">Coupon list</h2>
    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <!--test-->
    <div class="gift-container row">
        <div class="gift-box col-1" id="giftBox">
            <span class="gift-icon">&#127873;</span>
            <span class="open-icon">&#127873;</span>
        </div>
        <div class="col" id="couponCode" style="display: none;"></div>
    </div>

    
    <!--test-->
    <a href="{{Route('coupon.add')}}" class="btn btn-success">Add</a>        
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Applies</th>
                <th>Type</th>
                <th>Value</th>
                <th>Max Value</th>
                <th>Description</th>
                <th>Date Created</th>
                <th>Date Expires</th>
                <th>Status</th>
                <th colspan="3">Aplication</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupons as $coupon)
            <tr>
                <td>{{$coupon->id}}</td>
                <td>{{$coupon->code}}</td>
                <td>{{$coupon->applies}}</td>
                <td>{{$coupon->type=="percent"?"%":"VND"}}</td>
                <td>{{$coupon->type=="percent"?$coupon->value."%":$coupon->value."VND"}}</td>
                <td>{{$coupon->max_value."VND"}}</td>
                <td>{{$coupon->description}}</td>
                <td>{{$coupon->date_created}}</td>
                <td>{{$coupon->date_expires}}</td>
                <td>{{$coupon->status=="free"?"Free":$coupon->status}}</td>
                <td><a href="{{Route('coupon.edit',$coupon)}}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{Route('coupon.delete',$coupon->id)}}" class="btn btn-danger">Delete</a></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" data-coupon-code="{{$coupon->code}}">
                        Send
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{Route('coupon.send')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="sendCodeInput" id="sendCodeInput">
                        <p><b>Coupon Code: </b><span id="couponCodePlaceholder"></span></p>
                        <label for="id" class="form-label">Choose User from the list:</label>
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

    <script>
        const giftBox = document.getElementById('giftBox');
        const couponCode = document.getElementById('couponCode');

        giftBox.addEventListener('click', async () => {
            try {
                const response = await fetch('coupon/get');
                const data = await response.json();

                if (data.randomCode) {
                    couponCode.innerText = 'Your coupon: ' + data.randomCode;
                    couponCode.style.display = 'block';

                    giftBox.classList.add('open');
                    setTimeout(() => {
                        giftBox.querySelector('.gift-icon').style.opacity = 0;
                        giftBox.querySelector('.open-icon').style.opacity = 1;
                    }, 300);
                }
            } catch (error) {
                console.error(error);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('button[data-bs-target="#myModal"]').on('click', function() {
                var sendCode = $(this).data('coupon-code');
                $('#couponCodePlaceholder').text(sendCode);
                $('#sendCodeInput').val(sendCode);
            });
        });
    </script>
    
@endsection
