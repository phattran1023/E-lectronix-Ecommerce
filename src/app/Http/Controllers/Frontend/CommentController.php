<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function imgIndex()
    {
        $images = UserImage::all();
        return view(url('collections/comment'), compact('images'));
    }
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string',
                'images' => 'nullable',
                'images.*' => 'bail|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('messageComment', 'Comment area is required.');
            }
            $post = Product::where('slug', $request->post_slug)->where('status', '0')->first();

            if ($post) {

                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body,

                ]);

            } else {
                return redirect()->back()->with('messageComment', 'No Such Post found');
            }
            return redirect(url('collections/comment'));
        } else {
            return redirect()->back()->with('messageComment', 'Login is required for comment');
        }
    }




    public function destroy(Request $request)
    {
        if (Auth::check()) {
            $comment = Comment::where('id', $request->comment_id)
                ->where('user_id', Auth::user()->id)
                ->first();
            if ($comment) {
                $comment->delete();
                return response()->json([
                    'status' => 200,
                    'message ' => 'Comment deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message ' => 'Somethings went wrong'
                ]);
            }

        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login to Delete this comment'
            ]);
        }
    }
    
}