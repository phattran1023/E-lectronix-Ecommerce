<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.users.profile');
    }

    public function updateUser(Request $request)
    {

        $request->validate([
            'username' => ['required', 'string'],
            'phone' => ['required', 'digits:9'],
            'zip_code' => ['required', 'digits:6'],
            'address' => ['required', 'string', 'max:500'],
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->username,

        ]);

        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone' => $request->phone,
                'zip_code' => $request->zip_code,
                'address' => $request->address,
            ]
        );
        return redirect()->back()->with('message', 'User profile updated');
    }

    public function passwordCreate()
    {
        return view('frontend.users.change-password');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}
