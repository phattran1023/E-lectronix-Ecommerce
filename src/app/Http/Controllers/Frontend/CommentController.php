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
use Illuminate\Support\Facades\File;


class CommentController extends Controller
{

    //storing comments
    public function store(Request $request)
    {
        $badWords = $this->getBadWords();

        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string|max:50',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('messageComment', 'Comment out of length.');
            }

            // Check for bad words in the comment body
            foreach ($badWords as $badWord) {
                if (stripos($request->comment_body, $badWord) !== false) {
                    return redirect()->back()->with('messageComment', 'The comment contains sensitive words.');
                }
            }

            $product = Product::where('slug', $request->post_slug)->where('status', '0')->first();

            if ($product) {
                Comment::create([
                    'post_id' => $product->id,
                    'user_id' => Auth::user()->id,
                    'user_name' =>Auth::user()->name,
                    'comment_body' => $request->comment_body,
                    
                ]);

            } else {
                return redirect()->back()->with('messageComment', 'No Such Post found');
            }
            //Do sort for the earliest Comment
            $comments = Comment::where('post_id', $product->id)
                ->orderBy('created_at', 'asc')
                ->get();
          
            return redirect(url('collections/comment'));

        } else {
            return redirect()->back()->with('messageComment', 'Login is required for comment');
        }
    }


    //Use for deleting comments
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
    // read BadWords contents
    protected function getBadWords()
    {
        $path = public_path('badWords.csv');

        if (File::exists($path)) {
            $badWords = [];
            if (($handle = fopen($path, 'r')) !== false) {
                while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                    $badWords[] = $data[0]; // Assuming the bad words are in the first column of the CSV file
                }
                fclose($handle);
            }
            return $badWords;
        } else {
            // Return an empty array if the file is not found
            return [];
        }
    }

    //display information on reporting.
    public function index(Request $request)
    {
        if (Auth::check()) {
            $comment = Comment::where('id', $request->comment_id)

                ->first();
            $user = User::where('id', $comment->user_id)->first();
            if ($comment && $user) {
                return response()->json([
                    'comment' => $comment,
                    'user' => $user,
                    'status' => 200,
                ]);

            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login to Report this comment'
            ]);
        }
    }

}