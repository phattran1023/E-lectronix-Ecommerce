<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class socialLoginController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('An error occurred while logging in with Google.');
        }
        if ($user->getEmail() === null) {
            return redirect('/login')->withErrors('The account has an invalid email, please choose another login method.');
        } else {
            $existingUser = User::where('email', $user->getEmail())->first();
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $password_default='12345678';
                $newUser = new User();
                $newUser->name = $user->getName();
                $newUser->email = $user->getEmail();
                $newUser->password = Hash::make($password_default);
                $newUser->role_as = '3';
                $newUser->save();
                Auth::login($newUser);
            }
            return redirect('/'); 
        }
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback(){
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('An error occurred while logging in with Twitter.');
        }
        if ($user->getEmail() === null) {
            return redirect('/login')->withErrors('The account has an invalid email, please choose another login method.');
        } else {
            $existingUser = User::where('email', $user->getEmail())->first();
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $password_default='12345678';
                $newUser = new User();
                $newUser->name = $user->getName();
                $newUser->email = $user->getEmail();
                $newUser->password = Hash::make($password_default);
                $newUser->role_as = '3';
                $newUser->save();
                Auth::login($newUser);
            }
            return redirect('/'); 
        }
    }
}
