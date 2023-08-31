<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store()
    {
        if (Auth::check()) {

        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login to reply this comment'
            ]);
        }
    }
}