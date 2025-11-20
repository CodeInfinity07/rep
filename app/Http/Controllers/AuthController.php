<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->only('username'));
        }

        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/');
        }

        return back()
            ->withErrors(['username' => 'Invalid credentials. Please check your username and password.'])
            ->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
