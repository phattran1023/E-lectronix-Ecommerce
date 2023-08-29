<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\ReportComment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ReportedComment extends Controller
{
  public function index(Request $request){
    $report_comment_info = ReportComment::where('id', $request->report_id);
    $comment_info = Comment::where('id',$report_comment_info->report_id);
    $post_info = Product::where('id',$comment_info->post_id);
    if($report_comment_info && $comment_info && $post_info){
      return response()->json([
        'report_comment_info' => $report_comment_info,
        'comment_info' => $comment_info,
        'post_info' => $post_info,
        'status' => 200,
    ]);
    }else{
      response()->json([
        'messageErr' => 'Can not find any information about that comment.',
        'status' => 500,
    ]);
    }
  }
   public function store(Request $request,$commentId,$userId){
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
      $userInfo = User::findOrFail($userId);
     
      $commentInfo = Comment::findOrFail($commentId);
      

      $reportComment = new ReportComment();
      $reportComment->report_id = $commentInfo->id;
      $reportComment->reporter_id = $userInfo->id;
      $reportComment->reporter_name = $userInfo->name;
      $reportComment->comment_owner = $commentInfo->user_name;
      $reportComment->user_comment = $commentInfo->comment_body;
      //report begin
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
