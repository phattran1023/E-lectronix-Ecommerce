@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Product
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantiy</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{-- Lấy name từ bảng catagory thông qua catagory_id --}}
                                        
                                            {{ $item->categoryGetName->name }}
                                        
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td><a href="{{url('admin/products/'.$item->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{url('admin/products/'.$item->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this product ?')" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No product available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
