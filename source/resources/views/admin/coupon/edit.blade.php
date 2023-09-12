@extends('layouts.admin')

@section('title', 'Admin Edit Coupon')

@section('content')
<style>
    .input-group-text{
        width: 170px;
    }
</style>
    <div class="container mt-3">
    <h2>Stacked form</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p><i class="fas fa-exclamation-triangle"></i> {{ $error }}</p>
            @endforeach
        </div>
    @endif
    {{-- @if (session('Error'))
        <div class="alert alert-danger" role="alert">
            <span>Error: {{ session('Error') }} !</span>
        </div>
    @endif --}}
    <a href="{{Route('coupon.index')}}" class="btn btn-info">View Coupons List</a>
    <form action="{{Route('coupon.update',$coupon)}}" method="POST" class="mt-4 mb-4">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="input-group mb-3 col">
                <span for="code" class="input-group-text">Coupon Code</span>
                <input type="text" class="form-control" value="{{$coupon->code}}" disabled>
                <input type="hidden" class="form-control" id="code" name="code" value="{{$coupon->code}}">
            </div>
        </div>
        
        <div class="input-group mb-3">
            <span for="applies" class="input-group-text">Applies To</span>
            <select class="form-select" name="applies">
                <option value="All Products" {{ $coupon->applies === 'All Products' ? 'selected' : '' }}>All Products</option>
                @foreach ($products as $product)
                    <option value="{{$product->id}}" {{ $coupon->applies === $product->id ? 'selected' : '' }}>{{$product->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="input-group mb-3 col">
                <span for="type" class="input-group-text">Coupon Type</span>
                <select class="form-select" name="type">
                    <option value="percent" {{ old('type') === 'percent' ? 'selected' : '' }}>Percent (%)</option>
                    <option value="amount" {{ old('type') === 'amount' ? 'selected' : '' }}>Fixed Amount (VND)</option>
                </select>
            </div>
            <div class="input-group mb-3 col">
                <span for="value" class="input-group-text">Value</span>
                <input type="number" class="form-control" id="value" name="value" value="{{ old('value', $coupon->value) }}">
            </div>
    
            <div class="input-group mb-3 col">
                <span for="max_value" class="input-group-text">Max Value</span>
                <input type="number" class="form-control" id="max_value" name="max_value" value="{{ old('max_value', $coupon->max_value) }}">
            </div>
        </div>

        <div class="input-group mb-3">
            <span for="description" class="input-group-text">Description</span>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description',$coupon->description) }}">
        </div>

        <div class="row">
            <div class="input-group mb-3 col">
                <span for="date_created" class="input-group-text">Date Created</span>
                <input type="datetime-local" class="form-control" id="date_created" name="date_created" value="{{ old('date_created', $coupon->date_created) }}">
            </div>
    
            <div class="input-group mb-3 col">
                <span for="date_expires" class="input-group-text">Date Expires</span>
                <input type="datetime-local" class="form-control" id="date_expires" name="date_expires" value="{{ old('date_expires', $coupon->date_expires) }}">
            </div>
        </div>

        <div class="input-group mb-3 mx-5">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="status" name="status" {{ $coupon->status=='free' ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Show on Home panel</label>
            </div>
            <input type="hidden" name="status_current" value="{{$coupon->status}}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
@endsection

