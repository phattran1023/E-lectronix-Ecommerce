@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #eee;
    }

    .wrapper {
        height: 100vh;
    }

    .card {
        position: relative;
        background-color: #7B1FA2;
        padding: 10px;
        width: 320px;
        min-height: 420px;
        border: none;
    }

    .content {
        z-index: 10;
    }

    .logo {
        margin-bottom: 50px;
    }

    .off {
        line-height: 0px;
    }

    .off h1 {
        font-size: 80px;
    }

    .off span {
        margin-right: 111px;
    }

    .plus {
        font-size: 23px;
    }

    .code {
        text-transform: uppercase;
        padding: 10px;
        background-color: #fff;
        color: rgb(133, 19, 126);
        font-size: 16px;
    }

    .cross-bg {
        height: 100%;
        width: 100%;
        position: absolute;
        background-color: #9C27B0;
        left: 0px;
        top: 0px;
        opacity: 0.4;
        clip-path: polygon(50% 0%, 90% 20%, 100% 60%, 75% 100%, 25% 100%, 0% 60%, 10% 20%);
        z-index: 1;
    }
    .des{
        height: 2.2em;
        overflow: hidden;
    }
    .fa-copy:hover{
        transform: scale(1.2);
        border: #7B1FA2;
        transition-duration: 0.5s;   
    }
</style>
@if (session('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif
<div class="wrapper d-flex justify-content-center align-items-center">
    @foreach ($coupons as $coupon)
    <div class="card mx-3">
        <div class="cross-bg">
        </div>
        <div class="content">
            <div class="logo text-right row">
                <img class="col col-6" src="{{asset('assets/img/coupon.png')}}" width="50%">
                <span class="col col-6" style="color: white;">EXP: {{$coupon->date_expires}}</span>
            </div>
            <div class="text-center text-uppercase text-white off">
                <span>Discount</span>
                <h1 class="mt-0">{{$coupon->type=='percent'?$coupon->value.'%':($coupon->value/1000).'K'}}</h1>
            </div>
            <div class="text-center text-white">
                <span class="plus">Max: {{$coupon->max_value}}VND</span>
            </div>
            <div class="text-center text-uppercase text-white">
                <h3 class="m-0 des">{{$coupon->description}}</h3>
            </div>
            <div class="px-3 mb-3 ">
                <div class="code text-center mt-4 row">
                    <input class="col col-10 text-center" id="coupon{{ $coupon->id }}" value="{{ $coupon->code }}" style="border: none">
                    <i class="far fa-copy fa-sm col col-2" style="font-size: 25px" onclick="copyCouponCode('coupon{{ $coupon->id }}')"></i>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<script>
    function copyCouponCode(elementId) {

        var copyText = document.getElementById(elementId);

        if (copyText) {
            copyText.select();
            copyText.setSelectionRange(0, 99999); 
            navigator.clipboard.writeText(copyText.value);
            alert("Coppied: " + copyText.value);
        } else {
            alert("Not found id: " + elementId + "!");
        }
    }
</script>
@endsection