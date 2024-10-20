<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // \App\Models\User::create(['name' => 'Test User', 'email' => 'test@example.com','password' => bcrypt('password123')]);
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('product');
        }

        return back()->withErrors([
            'email' => 'Email does not exist.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
