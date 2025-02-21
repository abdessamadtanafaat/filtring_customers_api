<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('custom-login');
    }

    // Handle login request
    public function handleLogin(Request $request)
    {
        $username = env('BASIC_AUTH_USER', 'admin');
        $password = env('BASIC_AUTH_PASS', 'password');

        // Validate credentials
        if ($request->input('username') === $username && $request->input('password') === $password) {
            // Store credentials in session or set authenticated state
            session(['authenticated' => true]);
            return redirect()->route('user-page');  // Redirect to dashboard after successful login
        }

        // If authentication fails, return an error
        return back()->withErrors(['message' => 'Invalid credentials'])->withInput();
    }
}
