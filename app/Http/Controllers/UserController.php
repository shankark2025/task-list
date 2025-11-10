<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    /*
    public function show(User $user)
    {
        return $user->name;

    }
    */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Get credentials
        $credentials = $request->only('email', 'password');

        // Try logging in using the default 'web' guard
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }

        // If login fails
        return back()->with('error', 'Invalid credentials!');
    }

    public function dashboard()
    {
        return view('user.dashboard');
        //return "Welcome user";
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
