<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Survey;
use App\Models\SurveyUser;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(){
        $surveys = Survey::all();
        return view('admin.coupon.survey.index', compact('surveys'));
    }
    public function add(){
        return view('admin.coupon.survey.add');
    }
    public function store(Request $request){
        $request->validate([
            'question'=>'required',
            'ans_a'=>'required',
            'ans_b'=>'required',
            'ans_c'=>'required',
            'ans_d'=>'required',
            'correct'=>'required',
        ]);
        
        $survey = new Survey;
        $survey->question = $request->question;
        $survey->ans_a = $request->ans_a;
        $survey->ans_b = $request->ans_b;
        $survey->ans_c = $request->ans_c;
        $survey->ans_d = $request->ans_d;
        $survey->correct = $request->correct;
        $survey->save();

        return redirect('admin/survey')->with('message','Add new Question successfully!');
    }
    public function edit($id){
        $survey = Survey::find($id);
        return view('admin.coupon.survey.edit',compact('survey'));
    }
    public function update(Request $request){
        $request->validate([
            'question'=>'required',
            'ans_a'=>'required',
            'ans_b'=>'required',
            'ans_c'=>'required',
            'ans_d'=>'required',
            'correct'=>'required',
        ]);
        
        $survey = Survey::find($request->id);
        $survey->question = $request->question;
        $survey->ans_a = $request->ans_a;
        $survey->ans_b = $request->ans_b;
        $survey->ans_c = $request->ans_c;
        $survey->ans_d = $request->ans_d;
        $survey->correct = $request->correct;
        $survey->save();

        return redirect('admin/survey')->with('message','Add new Question successfully!');
    }
    public function delete($id){
        $survey = Survey::findOrFail($id);
        if($survey){
            $survey->delete();
            return redirect()->back()->with('message','Deleted Question successfully!');
        }else{
            return redirect()->back()->with('message','Delete Error!');
        }
    }
    public function survey(){
        // $surveys = Survey::all()->take(4);
        $user_id = auth()->user()->id;
        $answeredSurveyIds = SurveyUser::where('user_id', $user_id)->pluck('survey_id')->all();
        $unansweredSurveys = Survey::whereNotIn('id', $answeredSurveyIds)->get();
        $count = $unansweredSurveys->count();
        $surveys = $unansweredSurveys->toArray();
        if($count>=4){
            // $surveys = Survey::all()->toArray(); // Chuyển đổi thành mảng
            shuffle($surveys); 
            $randomSurveys = array_slice($surveys, 0, 4);
            // dd($randomSurveys);
            return view('admin.coupon.survey.survey',compact('randomSurveys'));
        }else{
            return redirect('coupon/user')->with('message', 'Sorry, There are no more questions to take the survey! See you again.');
        }
    }
    public function surveySubmit(Request $request){
        $point = 0;
        $SurveyidArray = [];
        for ($i=1; $i < 5; $i++) { 
            $idInput = 'quest'.$i;
            $id = $request->$idInput;
            $ansInputName = 'ans'.$i;
            $ans = $request->$ansInputName;
            $survey = Survey::where('id', $id)->first();
            // dd($survey);
            $correct_ans = $survey->correct;

            if($correct_ans=='A'){
                $correct_ans = $survey->ans_a;
            }else if ($correct_ans=='B') {
                $correct_ans = $survey->ans_b;
            }else if ($correct_ans=='C') {
                $correct_ans = $survey->ans_c;
            }else{
                $correct_ans = $survey->ans_d;
            }
            if($ans==$correct_ans){
                $point = $point + 1;

                $SurveyidArray[] = $id;
            }
            // dd('id:'.$id,'answer:'.$ans,'correct:'.$correct_ans,'point:'.$point);
            //save to surveyUsers table
            // $surveyUser = new SurveyUser;
            // $user_id = auth()->user()->id;
            // $surveyUser->user_id = $user_id;
            // $surveyUser->survey_id = $id;
            // $surveyUser->save();
        }
        // dd($SurveyidArray);   
        if($point===4){
            $now = Carbon::now()->toDateTimeString();
            $coupon = Coupon::where('status', 'survey')
                    ->where('date_expires', '>', $now)
                    ->first();
            // dd($coupon); 
            if($coupon){
                $user_id = auth()->user()->id;
                $coupon->status = $user_id;
                $coupon->save();
                // dd($coupon);
                foreach ($SurveyidArray as $element) {
                    $surveyUser = new SurveyUser;
                    $user_id = auth()->user()->id;
                    $surveyUser->user_id = $user_id;
                    $surveyUser->survey_id = $element;
                    $surveyUser->save();
                }
                return redirect('coupon/user')->with('message', 'Congratulations on receiving the coupon! ('.$coupon->code.')');
            }else{
                return redirect('coupon/user')->with('message', 'Sorry, out of Coupon code now, see you later!');
            }
        }else{
            return redirect('coupon/user')->with('message', 'your point is: '.($point/4*100).' P. Please try again!');
        }
        return redirect('coupon/user')->with('message','Survey submitted successfully');
    }
}
