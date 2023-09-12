@extends('layouts.admin')

@section('title', 'Admin Coupon List')

@section('content')
<h1 class="text text-center">Add Question</h1>
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
<form action="{{Route('survey.store')}}" method="Post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="question" class="form-label">Question:</label>
      <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question" value="{{old('question')}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="ans_a" class="form-label">Answer A:</label>
        <input type="text" class="form-control" id="ans_a" placeholder="Enter Answer A" name="ans_a" value="{{old('ans_a')}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="ans_b" class="form-label">Answer B:</label>
        <input type="text" class="form-control" id="ans_b" placeholder="Enter AnswerB" name="ans_b" value="{{old('ans_b')}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="ans_c" class="form-label">Answer C:</label>
        <input type="text" class="form-control" id="ans_c" placeholder="Enter Answer C" name="ans_c" value="{{old('ans_c')}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="ans_d" class="form-label">Answer D:</label>
        <input type="text" class="form-control" id="ans_d" placeholder="Enter Answer D" name="ans_d" value="{{old('ans_d')}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="correct" class="form-label">Correct Answer:</label>
        <Select name="correct">
            <option value="A" {{old('correct')=='A'?'selected':''}}>A</option>
            <option value="B" {{old('correct')=='B'?'selected':''}}>B</option>
            <option value="C" {{old('correct')=='C'?'selected':''}}>C</option>
            <option value="D" {{old('correct')=='D'?'selected':''}}>D</option>
        </Select>
    </div>
    
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection