<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\User;
use App\Models\LedgerEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BetController extends Controller
{
    public function placeBet(Request $request)
    {
        $request->validate([
            'market_id' => 'required|string',
            'event_id' => 'required|string',
            'event_name' => 'required|string',
            'market_name' => 'required|string',
            'selection_name' => 'required|string',
            'selection_id' => 'required|string',
            'bet_type' => 'required|in:back,lay',
            'odds' => 'required|numeric|min:1.01',
            'stake' => 'required|numeric|min:1',
            'sport_type' => 'nullable|string',
        ]);

        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        if (!$user->can_bet) {
            return response()->json([
                'success' => false,
                'message' => 'Betting is disabled for your account'
            ], 403);
        }

        $stake = floatval($request->stake);
        $odds = floatval($request->odds);
        $betType = $request->bet_type;

        if ($betType === 'back') {
            $liability = $stake;
            $potentialProfit = $stake * ($odds - 1);
        } else {
            $liability = $stake * ($odds - 1);
            $potentialProfit = $stake;
        }

        $userBalance = floatval($user->balance ?? 0);
        if ($userBalance < $liability) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient balance. Required: ' . number_format($liability, 2) . ', Available: ' . number_format($userBalance, 2)
            ], 400);
        }

        $sportType = $request->sport_type ?? 'cricket';
        $maxBetField = 'max_bet_' . strtolower($sportType);
        $maxBet = floatval($user->$maxBetField ?? 0);
        
        if ($maxBet > 0 && $stake > $maxBet) {
            return response()->json([
                'success' => false,
                'message' => 'Stake exceeds maximum allowed bet of ' . number_format($maxBet, 2) . ' for ' . ucfirst($sportType)
            ], 400);
        }

        try {
            DB::beginTransaction();

            $bet = Bet::create([
                'user_id' => $user->id,
                'market_id' => $request->market_id,
                'event_id' => $request->event_id,
                'event_name' => $request->event_name,
                'market_name' => $request->market_name,
                'selection_name' => $request->selection_name,
                'selection_id' => $request->selection_id,
                'sport_type' => $sportType,
                'bet_type' => $betType,
                'odds' => $odds,
                'stake' => $stake,
                'liability' => $liability,
                'profit' => $potentialProfit,
                'status' => 'pending',
                'matched_amount' => 0,
                'unmatched_amount' => $stake,
                'placed_at' => now(),
            ]);

            $newBalance = $userBalance - $liability;
            $user->balance = $newBalance;
            $user->save();

            LedgerEntry::create([
                'user_id' => $user->id,
                'description' => 'Bet placed: ' . $request->selection_name . ' @ ' . $odds . ' (' . ucfirst($betType) . ')',
                'amount' => -$liability,
                'balance' => $newBalance,
                'type' => 'bet',
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Bet placed successfully',
                'bet' => [
                    'id' => $bet->id,
                    'selection_name' => $bet->selection_name,
                    'bet_type' => $bet->bet_type,
                    'odds' => $bet->odds,
                    'stake' => $bet->stake,
                    'liability' => $bet->liability,
                    'potential_profit' => $bet->profit,
                    'status' => $bet->status,
                ],
                'new_balance' => $newBalance,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Bet placement failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to place bet. Please try again.'
            ], 500);
        }
    }

    public function getUserBets(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        $status = $request->query('status');
        
        $query = Bet::where('user_id', $user->id)
            ->orderBy('placed_at', 'desc');
        
        if ($status) {
            $query->where('status', $status);
        }
        
        $bets = $query->get();

        return response()->json([
            'success' => true,
            'bets' => $bets,
        ]);
    }

    public function getOpenBets(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        $marketId = $request->query('market_id');
        
        $query = Bet::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'matched'])
            ->orderBy('placed_at', 'desc');
        
        if ($marketId) {
            $query->where('market_id', $marketId);
        }
        
        $bets = $query->get();

        return response()->json([
            'success' => true,
            'bets' => $bets,
        ]);
    }

    public function cancelBet(Request $request, $betId)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        $bet = Bet::where('id', $betId)
            ->where('user_id', $user->id)
            ->where('status', 'pending')
            ->first();

        if (!$bet) {
            return response()->json([
                'success' => false,
                'message' => 'Bet not found or cannot be cancelled'
            ], 404);
        }

        try {
            DB::beginTransaction();

            $refundAmount = $bet->liability;
            $newBalance = floatval($user->balance) + $refundAmount;
            
            $bet->status = 'cancelled';
            $bet->save();

            $user->balance = $newBalance;
            $user->save();

            LedgerEntry::create([
                'user_id' => $user->id,
                'description' => 'Bet cancelled: ' . $bet->selection_name . ' @ ' . $bet->odds,
                'amount' => $refundAmount,
                'balance' => $newBalance,
                'type' => 'bet_cancel',
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Bet cancelled successfully',
                'refund_amount' => $refundAmount,
                'new_balance' => $newBalance,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Bet cancellation failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to cancel bet. Please try again.'
            ], 500);
        }
    }
}
