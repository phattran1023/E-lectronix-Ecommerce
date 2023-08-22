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
        'form-violence'=>'nullable',
        'form-hate'=>'nullable',
        'form-suicide'=>'nullable',
        'form-misinformation'=>'nullable',
        'form-frauds'=>'nullable',
        'form-deceptive'=>'nullable',
       
        'form-else'=>'nullable|max:50',
    ]);

    if ($validator) {
      //handle success
        $commentInfo = Comment::where('id','commentInfo');
      $reportComment = new ReportedComment();
      $reportComment->

    } else {
        //handle fail
        return response()->json([
            'status' => 500,
            'elseComment' => 'Words must be less then 30',
        ]);
    }
       


       
   }
}
