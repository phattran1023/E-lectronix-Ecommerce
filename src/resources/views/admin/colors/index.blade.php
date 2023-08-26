@extends('layouts.admin')
@section('title', 'Admin Colors List')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Colors List
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm float-end">Add Color</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Color Name</th>
                                <th>Color Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($color as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->status ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' . $item->id . '/edit') }}"
                                            class="btn btn-danger btn-sm">Edit</a>
                                        <a href="{{url('admin/colors/' . $item->id . '/delete')}}" onclick="return confirm('Are you sure you want to delete this color ?')" class="btn btn-warning btn-sm">Delete</a>
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
