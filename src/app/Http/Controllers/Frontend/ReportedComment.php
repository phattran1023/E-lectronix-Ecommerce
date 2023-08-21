<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\ReportedComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
   public function store(Request $request){
    $validator = Validator::make($request->all(), [
        'link'=>'nullable',
        'spamming'=>'nullable',
        'attitude'=>'nullable',
        'elseContent'=>'nullable|max:30',
    ]);

    if ($validator) {
       //handle success
       $commentInfo = Comment::where('id', $request->comment_id)
       ->where('user_id', Auth::user()->id)
       ->first();
       $reportedComment = new ReportedComment();
        $reportedComment->report_id = $commentInfo->comment_id;
        $reportedComment->reporter_id = $commentInfo->user_id;
        $reportedComment->user_comment = $commentInfo->comment_body;
        $reportedComment->link = $request->link;
        $reportedComment->spamming = $request->spamming;
        $reportedComment->attitude = $request->attitude;
        $reportedComment->else = $request->else;
        dd($reportedComment);
        // $reportedComment->save();
        // return response()->json([
        //     'status' => 200,
        //     'messageComment' => 'Reported successfully',

        // ]);
    } else {
        //handle fail
        return response()->json([
            'status' => 500,
            'elseComment' => 'Words must be less then 30',
        ]);
    }
       


       
   }
}
