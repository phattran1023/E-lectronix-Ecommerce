<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ReportComment;
use App\Models\User;
use Illuminate\Http\Request;

class ReportedComment extends Controller
{
    public function indexAdmin(){
        $reportIndex = ReportComment::all();
        $userIndex = User::all();
        $reportPaginate = ReportComment::paginate(10);
        return view('admin.comments.index',compact('reportIndex','reportPaginate','userIndex'));
      }
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
}
