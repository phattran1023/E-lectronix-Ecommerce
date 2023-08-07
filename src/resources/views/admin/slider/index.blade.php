@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end">Add Slider</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>

                                    <td>{{$item->description}}</td>
                                    <td>
                                        
                                        <img src="{{asset("$item->image")}}" style="width:70px; height:70px;" alt="">
                                    </td>
                                    <td>{{$item->status == '0'?'Visible':'Hidden'}}</td>
                                    <td>
                                        <a href="{{url('admin/sliders/'.$item->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('admin/sliders/'.$item->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this ?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
