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

    public function bets(Request $request)
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
        
        // Get filter parameters
        $eventTypeId = $request->input('EventTypeId', 0);
        $betStatus = $request->input('BetStatus', 0);
        $from = $request->input('From', now()->startOfDay()->toIso8601String());
        $to = $request->input('To', now()->endOfDay()->toIso8601String());
        
        // Build bets query with filters
        $betsQuery = DB::table('bets')
            ->where('user_id', $user->id);
        
        // Filter by event type
        if ($eventTypeId > 0) {
            $betsQuery->where('event_type_id', $eventTypeId);
        }
        
        // Filter by status
        $statusMap = [
            0 => ['pending', 'matched'], // Active
            2 => ['settled', 'won', 'lost'], // Settled
            3 => ['voided'], // Voided
            4 => ['cancelled'] // Cancelled
        ];
        
        if (isset($statusMap[$betStatus])) {
            $betsQuery->whereIn('status', $statusMap[$betStatus]);
        }
        
        // Filter by date range
        if ($from) {
            $betsQuery->where('created_at', '>=', $from);
        }
        if ($to) {
            $betsQuery->where('created_at', '<=', $to);
        }
        
        $bets = $betsQuery->orderBy('created_at', 'desc')->get();
        
        $data = [
            'username' => $user->username,
            'credit' => $user->credit_remaining ?? 0,
            'balance' => $user->balance ?? 0,
            'liable' => $activeBetsData->total_liability ?? 0,
            'active_bets' => $activeBetsData->count ?? 0,
            'bets' => $bets,
            'filters' => [
                'eventTypeId' => $eventTypeId,
                'betStatus' => $betStatus,
                'from' => $from,
                'to' => $to,
            ],
            'clientId' => $user->id,
        ];
        
        return view('bettor.bets', $data);
    }

    public function profitLoss(Request $request)
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
        
        // Get filter parameters
        $from = $request->input('From', now()->subMonths(3)->startOfDay()->toIso8601String());
        $to = $request->input('To', now()->endOfDay()->toIso8601String());
        
        // Get profit/loss data grouped by event type
        $profitLossData = DB::table('bets')
            ->where('user_id', $user->id)
            ->whereIn('status', ['won', 'lost', 'settled'])
            ->where('created_at', '>=', $from)
            ->where('created_at', '<=', $to)
            ->select(
                'event_type_id',
                DB::raw('SUM(CASE WHEN status = "won" THEN profit ELSE 0 END) as total_won'),
                DB::raw('SUM(CASE WHEN status = "lost" THEN -stake ELSE 0 END) as total_lost'),
                DB::raw('SUM(profit) as net_profit'),
                DB::raw('COUNT(*) as total_bets')
            )
            ->groupBy('event_type_id')
            ->get();
        
        $data = [
            'username' => $user->username,
            'credit' => $user->credit_remaining ?? 0,
            'balance' => $user->balance ?? 0,
            'liable' => $activeBetsData->total_liability ?? 0,
            'active_bets' => $activeBetsData->count ?? 0,
            'profitLossData' => $profitLossData,
            'filters' => [
                'from' => $from,
                'to' => $to,
            ],
            'clientId' => $user->id,
        ];
        
        return view('bettor.profitloss', $data);
    }
}
