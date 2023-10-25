@extends('layouts.admin')
@section('title', 'User Management')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Users
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm float-end">Add User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->role_as == '0')
                                            <label class="badge rounded-pill bg-primary">User</label>
                                        @elseif ($item->role_as == '1')
                                            <label class="badge rounded-pill bg-success">Admin</label>
                                        @else
                                            <label class="badge rounded-pill bg-danger">Google/Twitter User</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->role_as != $item->role_as)
                                            <a href="{{ url('admin/users/' . $item->id . '/edit') }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                        @endif
                                        @if (Auth::user()->role_as != $item->role_as)
                                            <a href="{{ url('admin/users/' . $item->id . '/delete') }}"
                                                onclick="return confirm('Are you sure you want to delete this user ?')"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No user available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
