@extends('layouts.admin')
@section('title', 'Edit Colors List')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Edit Color
                        <a href="{{ url('admin/colors/') }}" class="btn btn-warning btn-sm float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/colors/'.$color->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label >Color Name</label>
                            <input type="text" name="name" class="form-control" autofocus value="{{$color->name}}">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label >Color Code</label>
                            <input type="text" name="code" class="form-control" value="{{$color->code}}">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label >Status</label><br>
                            <input type="checkbox" name="status" style="width: 20px; height:20px" {{$color->status ? 'checked':''}}/>Checked=Hidden, Uncheck=visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
