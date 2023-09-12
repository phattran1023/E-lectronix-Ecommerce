@extends('layouts.admin')

@section('title', 'Admin Coupon List')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2>Survey Questions</h2>
        </div>
        <div class="col text-md-end">
            <a class="btn btn-info" href="{{Route('survey.add')}}">Add new Question</a>
            <a class="btn btn-info" href="{{Route('survey.survey')}}">View Survey</a>
        </div>
    </div>
    <hr class="hr" />
    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Question</th>
            <th>Answer A</th>
            <th>Answer B</th>
            <th>Answer C</th>
            <th>Answer D</th>
            <th>Correct</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($surveys as $survey)
        <tr>
            <td>{{$survey->id}}</td>
            <td>{{$survey->question}}</td>
            <td>{{$survey->ans_a}}</td>
            <td>{{$survey->ans_b}}</td>
            <td>{{$survey->ans_c}}</td>
            <td>{{$survey->ans_d}}</td>
            <td>{{$survey->correct}}</td>
            <td><a class="btn btn-primary" href="{{Route('survey.edit',$survey->id)}}">Edit</a></td>
            <td><a class="btn btn-danger" href="{{Route('survey.delete',$survey->id)}}">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
