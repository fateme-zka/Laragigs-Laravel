<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create User Form
    public function create()
    {
        return view('users.register');
    }

    // Store created user data
    public function store(Request $request)
    {
//        dd($request->all());
        // we need to do some validations first
        $formFields = $request->validate([
            'name' => ['required', 'min:3'], // should at least have 3 characters
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
//            'password' => ['required', 'confirmed', 'min:6'], // it will match the input what
        ]);

        // Hash password by bcrypt
        $formFields['password'] = bcrypt($formFields['password']);


        //if input validations passed create user:
        $user = User::create($formFields);

        // Login user
        auth()->login($user);

        return redirect('/')->with('message', 'New user created and logged in.');
    }

    // Logout User
    public function logout(Request $request)
    {
        // this will remove the authentication user information from user session
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate/Login User
    public function authenticate(Request $request)
    {
        // for validation fields
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // then we need to attempt to log the user in
        if (auth()->attempt($formFields)) {
            // we need to regenerate the session id
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in.');
        }
        // if the attempt was not successful
        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');

    }
}
