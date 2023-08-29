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
                    <h4>Reported comments
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm float-end">Add note</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>


                                <th><small>Reporter name</small></th>

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

                                    <td>{{ $comment->reporter_name }}</td>

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
                                        <button type="button" class="card btn-primary viewFullBtn" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop" value="{{$comment->id}}">
                                            View full
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
    {{-- View more modal --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Reporting from <a href=""
                            style="text-decoration: none">{{ $comment->reporter_name }}</a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session('avatar'))
                        <img src="{{ session('avatar') }}" width="30px"
                            style="border-radius:  50%; padding-bottom: 3px">&nbsp;
                    @else
                        <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}" width="30px"
                            style="border-radius:  50%">
                    @endif

                    <span class="">{{ $comment->comment_owner }}</span>

                    <div style="margin-top:5px">
                        <div class="d-flex bd-highlight">
                            <div class="p-1 flex-fill bd-highlight form-control" >{{ $comment->user_comment }}
                            </div>
                            <div class="p-8 flex-fill bd-highlight"> <button id="highlightButton">></button></div>

                        </div>
                    </div>
                    <div style=" margin-top: 10px;">

                        @if ($comment->else)
                            {{ $comment->else }}
                        @else
                            <p style="text-align: center">No "else" content yet</p>
                        @endif


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('viewFullBtn')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.viewFullBtn', function() {
                var viewFullClick = $(this);
                var report_id = viewFullClick.val();
                $.ajax({
                    type: "get",
                    url: "/viewFullInfo",
                    data: {
                        'report_id': report_id
                    },
                    success: function(res) {
                        if (res.status == 200) {

                            $(".comment-content").text(res.comment.comment_body);
                            $(".comment-name").text(res.user.name);
                        } else {
                            alert(res.messageErr);
                            $(".modal").modal('hide');
                        }
                    }
                });

            });


        });
    </script>
@endsection