<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{

    public function store(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Validate the request data
            $request->validate([
                'text' => 'required|string|max:50',
                // Customize validation rules as needed
                'replyClick' => 'required|integer', // Assuming it's the comment ID
            ]);

            // Create a new reply
            $reply = new Reply();
            $reply->origin_comment_id = $request->replyClick;

            $reply->user_id = Auth::id();
            $reply->user_name = Auth::user()->name;
            $reply->reply_body = $request->text;
            $reply->save();
            $comments = Comment::with('replies')->find($request->replyClick);
            // You can also update the original comment's reply count here if needed

            // Return a success response
            return response()->json([
                'status' => 200,
                'message' => 'Reply posted successfully',
                'comments' => $comments
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login to reply to this comment'
            ]);
        }
    }
}