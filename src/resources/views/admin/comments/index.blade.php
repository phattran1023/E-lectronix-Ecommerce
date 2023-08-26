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
                                
                                <th><small>Id</small></th>
                                <th><small>User name</small></th>
                                <th><small>User comment</small></th>
                                <th><small>Violence and abuse</small></th>
                                <th><small>Hate and harassment</small></th>
                                <th><small>Suicide and self-harm</small></th>
                                <th><small>Misinformation</small></th>
                                <th><small>Fradus and scamp</small></th>
                                <th><small>Deceptive behavior and spam</small></th>
                                <th><small>Else</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reportIndex as $comment)
                                <tr>
                                  <td>{{$comment->id}}</td>
                                    
                                  <td>{{$comment->user_comment}}</td>
                                  <td  class="d-flex justify-content-center"  >
                                    {!! $comment->violence == 1 ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">' : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
                                </td>
                                <td class="d-flex justify-content-center" > 
                                    {!! $comment->hate == 1 ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">' : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
                                </td>
                                <td class="d-flex justify-content-center" >
                                    {!! $comment->suicide == 1 ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">' : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
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
                    {{$reportPaginate->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
