<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = $this->broker()->createToken($user);
            $userName = $user->name; // Get user's name from relationship

            $user->notify(new CustomResetPasswordNotification($token, $userName));

            return back()->with('status', 'We have emailed your password reset link!');
        }

        return back()->withErrors(['email' => 'We couldn\'t find a user with that email address.']);
    }
}
