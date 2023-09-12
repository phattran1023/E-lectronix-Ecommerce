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
                    <h4>Reported comment data
                        <a href="{{ url('admin/comments/') }}" class="btn btn-warning btn-sm float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Comment from:</label>
                                <strong>{{$reportComment->comment_owner}}</strong>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>The comment:</label>
                                <strong class="bg-warning">{{$reportComment->user_comment}}</strong>
                            </div>
                            <div class="col-md-6 mb-5">
                                <label>The ELSE content:</label>
                                <strong class="bg-warning">
                                    {{$reportComment->else ? $reportComment->else : 'No "Else" yet.'}}
                                </strong>
                            </div>
                        </div>

                        <a href="{{ url('admin/comments/' . $reportComment->id .'/'. $reportComment->report_id. '/delete') }}"
                            onclick="return confirm('Are you sure you want to delete this user ?')"
                            class="btn btn-sm btn-danger">Manage deleting</a>

                </div>
            </div>
        </div>

    </div>
@endsection
