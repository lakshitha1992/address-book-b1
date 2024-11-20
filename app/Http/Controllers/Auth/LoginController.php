<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed, redirect to dashboard
            return redirect()->intended('contact/create');
        }

        // Authentication failed, redirect back with error
        return back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    // Log out the user
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}