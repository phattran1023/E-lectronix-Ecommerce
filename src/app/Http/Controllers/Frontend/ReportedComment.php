<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\ReportComment;

use Illuminate\Support\Facades\Validator;


class ReportedComment extends Controller
{
 
   public function store(Request $request,$id){
    $validator = Validator::make($request->all(), [
        'form_violence'=>'nullable',
        'form_hate'=>'nullable',
        'form_suicide'=>'nullable',
        'form_misinformation'=>'nullable',
        'form_frauds'=>'nullable',
        'form_deceptive'=>'nullable',
       
        'form-else'=>'nullable|max:50',
        'commentInfo'=> 'nullable',
    ]);

    if ($validator) {
      //handle success
    
    $commentInfo = Comment::findOrFail($id);
      $reportComment = new ReportComment();
      $reportComment->report_id = $commentInfo->id;
      $reportComment->reporter_id = $commentInfo->user_id;
      $reportComment->user_comment = $commentInfo->comment_body;
      $reportComment->violence = $request->form_violence;
      $reportComment->hate = $request->form_hate;
      $reportComment->suicide = $request->form_suicide;
      $reportComment->misinformation = $request->form_misinformation;
      $reportComment->frauds = $request->form_frauds;
      $reportComment->deceptive = $request->form_deceptive;
      $reportComment->else = $request->form_else;
      $reportComment->save();
      return redirect()->back()->with('reportComment', 'Reported successfully, wait for response.');
    } else {
        //handle fail
        return redirect()->back()->with('errorElse', '...');
    }
  }
   
}
