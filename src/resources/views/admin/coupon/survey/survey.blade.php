@extends('layouts.app')

@section('content')
<div class="container col-sm mt-5 mb-5">
    <div class="mx-0 mx-sm-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="card-title text-white mt-2" id="exampleModalLabel">Survey</h5>
            </div>
            <div class="text text-center">
                <h4 class="mt-2 mb-2">Complete survey to get coupon!</h4>
                <i class="far fa-file-alt fa-4x mb-3 text-primary mt-2"></i>
            </div>
            <div class="modal-body">
                <form class="px-4" action="{{Route('survey.submit')}}" method="POST">
                    @csrf
                    @foreach ($randomSurveys as $index => $survey)
                        <div class="question mx-4">
                            <p>
                                <strong>Question {{$index + 1}} : {{$survey['question']}}</strong>
                                <input type="hidden" name="quest{{$index + 1}}" value="{{$survey['id']}}">
                            </p>
                        </div>
                        <hr class="hr" />        
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="ans{{$index + 1}}" value="{{$survey['ans_a']}}"/>
                            <label class="form-check-label" for="radio3Example1">
                                {{$survey['ans_a']}}
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="ans{{$index + 1}}" value="{{$survey['ans_b']}}"/>
                            <label class="form-check-label" for="radio3Example2">
                                {{$survey['ans_b']}}
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="ans{{$index + 1}}" value="{{$survey['ans_c']}}"/>
                            <label class="form-check-label" for="radio3Example3">
                                {{$survey['ans_c']}}
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="ans{{$index + 1}}" value="{{$survey['ans_d']}}"/>
                            <label class="form-check-label" for="radio3Example4">
                                {{$survey['ans_d']}}
                            </label>
                        </div>
                        <hr class="hr" />  
                    @endforeach
                    <div class="d-grid gap-2 col-6 mx-auto mb-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>  
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection