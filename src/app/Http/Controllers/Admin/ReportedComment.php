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
    public function indexAdmin()
    {
        $reportIndex = ReportComment::all();
        $userIndex = User::all();
        $reportPaginate = ReportComment::paginate(10);
        
        return view('admin.comments.index', compact('reportIndex', 'reportPaginate', 'userIndex'));
    }
    
      
      public function index(Request $request)
      {
          $report_comment_info = ReportComment::where();
      
          if ($report_comment_info) {
              return response()->json([
                  'report_comment_info' => $report_comment_info,
                  'status' => 200,
              ]);
          } 
      }
}
