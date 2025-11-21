<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SportsPageController extends Controller
{
    public function cricket()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $user = Auth::user();
        
        if (strtolower($user->type) === 'bettor') {
            return view('bettor.cricket');
        }
        
        return view('sports.cricket');
    }

    public function soccer()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $user = Auth::user();
        
        if (strtolower($user->type) === 'bettor') {
            return view('bettor.soccer');
        }
        
        return view('sports.soccer');
    }

    public function tennis()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $user = Auth::user();
        
        if (strtolower($user->type) === 'bettor') {
            return view('bettor.tennis');
        }
        
        return view('sports.tennis');
    }
}
