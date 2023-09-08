<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class ReplyController extends Controller
{
    public function deleteReply($id)
    {
        if (Auth::check()) {
            $delReply = Reply::where('id', $id);
            $delReply->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->with('replyErr', "Login first to reply the comment.");
        }
    }
    public function commentReplyStore(Request $request, $id)
    {

        // Check if the user is authenticated
        if (Auth::check()) {
            // Validate the request data
            $request->validate([
                'textIput' => 'required|string|max:50',
                // Customize validation rules as needed

            ]);

            // Create a new reply
            $comments = Comment::with('replies')->find($id);
            $reply = new Reply();
            $reply->origin_comment_id = $id;

            $reply->user_id = Auth::id();
            $reply->user_name = Auth::user()->name;
            $reply->comment_owner = $comments->user_name;
            $reply->reply_body = $request->textIput;
            $reply->save();
           
            // You can also update the original comment's reply count here if needed

            // Return a success response
            return redirect()->back();

        } else {
            return redirect()->back()->with('messageComment', 'Login first.');
        }
    }
    public function replyReplyStore(Request $request, $replyId,$commentId){
  // Check if the user is authenticated
  if (Auth::check()) {
    // Validate the request data
    $request->validate([
        'textIput' => 'required|string|max:50',
        // Customize validation rules as needed

    ]);

    // Create a new reply
    $comments = Reply::where('id', $replyId)->first();
    $reply = new Reply();
    $reply->origin_comment_id = $commentId;

    $reply->user_id = Auth::id();
    $reply->user_name = Auth::user()->name;
    $reply->comment_owner = $comments->user_name;
    $reply->reply_body = $request->textIput;
    $reply->save();
   
    // You can also update the original comment's reply count here if needed

    // Return a success response
    return redirect()->back();

} else {
    return redirect()->back()->with('messageComment', 'Login first.');
}
    }
  

    public function likeBtn(Reply $reply)
    {
        $user = auth()->user();
        if ($user === null) {
            return response()->json(['likeErr' => 'Login is required for this action']);
        }
    
        if ($reply->isLikedByUser($user)) {
            $reply->likes()->where('user_id', $user->id)->delete();
        } else {
            $reply->likes()->create(['user_id' => $user->id]);
        }
        $likesCount = $reply->likes()->count();
    
        return response()->json(['replyLikes' => $likesCount]);
    }
    

}