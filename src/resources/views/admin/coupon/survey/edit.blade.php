@extends('layouts.admin')

@section('title', 'Admin Coupon List')

@section('content')
<h1 class="text text-center">Edit Question</h1>
<hr class="hr">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{Route('survey.update')}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <input type="hidden" name="id" value="{{$survey->id}}">
    </div>
    <div class="mb-3 mt-3">
      <label for="question" class="form-label">Question:</label>
      <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question" value="{{old('question',$survey->question)}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="ans_a" class="form-label">Correct Answer:</label>
        <input type="text" class="form-control" id="ans_a" placeholder="Enter Answer A" name="ans_a" value="{{old('ans_a',$survey->ans_a)}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="ans_b" class="form-label">Wrong Answer 1:</label>
        <input type="text" class="form-control" id="ans_b" placeholder="Enter Answer B" name="ans_b" value="{{old('ans_b',$survey->ans_b)}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="ans_c" class="form-label">Wrong Answer 2:</label>
        <input type="text" class="form-control" id="ans_c" placeholder="Enter Answer C" name="ans_c" value="{{old('ans_c',$survey->ans_c)}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="ans_d" class="form-label">Wrong Answer 3:</label>
        <input type="text" class="form-control" id="ans_d" placeholder="Enter Answer D" name="ans_d" value="{{old('ans_d',$survey->ans_d)}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="correct" class="form-label">Correct Answer:</label>
        <Select name="correct">
            <option value="A" {{$survey->correct=='A'?'selected':''}}>A</option>
            <option value="B" {{$survey->correct=='A'?'selected':''}}>B</option>
            <option value="C" {{$survey->correct=='A'?'selected':''}}>C</option>
            <option value="D" {{$survey->correct=='A'?'selected':''}}>D</option>
        </Select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection