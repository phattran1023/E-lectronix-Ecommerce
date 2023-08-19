<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ReportedComment;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
   public function store(Request $request){
        $request->validate([
            'badwords'=>'nullable',
            'spamming'=>'nullable',
            'attitude'=>'nullable',
            'elseContent'=>'nullable|max:30',
        ]);
        $reportedComment = new ReportedComment();
        
        $reportedComment->badwords = $request->badwords;
        $reportedComment->spamming = $request->spamming;
        $reportedComment->attitude = $request->attitude;
        $reportedComment->elseContent = $request->elseContent;
        $reportedComment->save();
   }
}
