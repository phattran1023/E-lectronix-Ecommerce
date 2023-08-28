<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
