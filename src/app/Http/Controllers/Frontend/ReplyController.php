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
   
    public function store(Request $request, $id)
    {

        // Check if the user is authenticated
        if (Auth::check()) {
            // Validate the request data
            $request->validate([
                'textIput' => 'required|string|max:50',
                // Customize validation rules as needed

            ]);

            // Create a new reply

            $reply = new Reply();
            $reply->origin_comment_id = $id;

            $reply->user_id = Auth::id();
            $reply->user_name = Auth::user()->name;
            $reply->reply_body = $request->textIput;
            $reply->save();
            $comments = Comment::with('replies')->find($request->$id);
            // You can also update the original comment's reply count here if needed

            // Return a success response
            return redirect()->back();

        } else {
            return redirect()->back()->with('messageComment', 'Login first.');
        }
    }
}