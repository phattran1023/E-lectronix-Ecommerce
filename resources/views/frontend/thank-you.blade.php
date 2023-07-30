@extends('layouts.app')

@section('title', 'Thank You for Shopping')

@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="p-4 shadow bg-white">

                        <h3>
                            Logo
                        </h3>
                        <h5>Thank you for shopping with us</h5>
                        <a href="{{ url('/') }}" class="btn btn-primary">Back to Homepage</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
