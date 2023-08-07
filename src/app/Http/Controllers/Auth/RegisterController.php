<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Read the CSV file and get bad words
        $badWords = $this->getBadWords();

        // Define the custom validation rule for bad words
        $badWordRule = Rule::notIn($badWords);

        return Validator::make($data, [
            'name' => [
                'required',
                'string',
                'max:255',
                $badWordRule, // Use the custom validation rule for name
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                $badWordRule, // Use the custom validation rule for email
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            // Custom error message for the bad word validation rule
            'name.not_in' => 'The :attribute contains sensitive words.',
            'email.not_in' => 'The :attribute contains sensitive words.',
        ]);
    }

    // Helper method to read bad words from the CSV file
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
