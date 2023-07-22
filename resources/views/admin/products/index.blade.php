@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-sucess">{{session('messsage')}}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Product
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
                    </h4>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
