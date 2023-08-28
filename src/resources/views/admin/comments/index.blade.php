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
                                <th><small>Reporter name</small></th>
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
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->reporter_name }}</td>
                                    <td>{{ $comment->user_comment }}</td>
                                    <td>
                                        {!! $comment->violence == 1
                                            ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">'
                                            : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
                                    </td>
                                    <td>
                                        {!! $comment->hate == 1
                                            ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">'
                                            : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
                                    </td>
                                    <td>
                                        {!! $comment->suicide == 1
                                            ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">'
                                            : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
                                    </td>
                                    <td>
                                        {!! $comment->misinformation == 1
                                            ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">'
                                            : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
                                    </td>
                                    <td>
                                        {!! $comment->frauds == 1
                                            ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">'
                                            : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
                                    </td>
                                    <td>
                                        {!! $comment->deceptive == 1
                                            ? '<img src="' . asset('/uploads/reportIcons/check.png') . '">'
                                            : '<img src="' . asset('/uploads/reportIcons/delete-button.png') . '">' !!}
                                    </td>
                                    <td>
                                        <button type="button" class="card btn-primary text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                           view more
                                          </button>
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
                    {{ $reportPaginate->links() }}
                </div>
            </div>
        </div>
    </div>
    {{--View more modal--}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>
          </div>
        </div>
      </div>
@endsection
