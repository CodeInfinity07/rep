<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BettorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Calculate active bets count and total liability
        $activeBetsData = DB::table('bets')
            ->where('user_id', $user->id)
            ->whereIn('status', ['pending', 'matched'])
            ->select(
                DB::raw('COUNT(*) as count'),
                DB::raw('COALESCE(SUM(liability), 0) as total_liability')
            )
            ->first();
        
        $data = [
            'username' => $user->username,
            'credit' => $user->credit_remaining ?? 0,
            'balance' => $user->balance ?? 0,
            'liable' => $activeBetsData->total_liability ?? 0,
            'active_bets' => $activeBetsData->count ?? 0,
        ];
        
        return view('bettor.index', $data);
    }

    public function profile()
    {
        $user = Auth::user();
        
        // Calculate active bets count and total liability
        $activeBetsData = DB::table('bets')
            ->where('user_id', $user->id)
            ->whereIn('status', ['pending', 'matched'])
            ->select(
                DB::raw('COUNT(*) as count'),
                DB::raw('COALESCE(SUM(liability), 0) as total_liability')
            )
            ->first();
        
        $data = [
            'username' => $user->username,
            'credit' => $user->credit_remaining ?? 0,
            'balance' => $user->balance ?? 0,
            'liable' => $activeBetsData->total_liability ?? 0,
            'active_bets' => $activeBetsData->count ?? 0,
        ];
        
        return view('bettor.profile', $data);
    }
}
