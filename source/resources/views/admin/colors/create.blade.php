@extends('layouts.admin')
@section('title', 'Create New Color')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Add Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-warning btn-sm float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/colors/create')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label >Color Name</label>
                            <input type="text" name="name" class="form-control" autofocus>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label >Color Code</label>
                            <input type="text" name="code" class="form-control">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label >Status</label><br>
                            <input type="checkbox" name="status" style="width: 20px; height:20px"/>Checked=Hidden, Uncheck=visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
