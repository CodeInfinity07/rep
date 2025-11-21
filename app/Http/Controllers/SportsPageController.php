<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SportsPageController extends Controller
{
    public function cricket()
    {
        return view('sports.cricket');
    }

    public function soccer()
    {
        return view('sports.soccer');
    }

    public function tennis()
    {
        return view('sports.tennis');
    }
}
