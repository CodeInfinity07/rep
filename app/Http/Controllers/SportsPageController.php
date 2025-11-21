<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SportsPageController extends Controller
{
    public function cricket()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        
        $user = Auth::user();
        
        \Log::info('Cricket page accessed', [
            'user' => $user->username,
            'type' => $user->type,
            'lowercase_type' => strtolower($user->type),
            'is_bettor' => strtolower($user->type) === 'bettor'
        ]);
        
        if (strtolower($user->type) === 'bettor') {
            \Log::info('Serving bettor cricket page');
            return view('bettor.cricket');
        }
        
        \Log::info('Serving management cricket page');
        return view('sports.cricket');
    }

    public function soccer()
    {
        if (!Auth::check()) {
            return redirect('/login');
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
            return redirect('/login');
        }
        
        $user = Auth::user();
        
        if (strtolower($user->type) === 'bettor') {
            return view('bettor.tennis');
        }
        
        return view('sports.tennis');
    }
}
