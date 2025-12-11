<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\User;
use App\Models\Result;
use App\Models\LedgerEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
            'market_type' => 'nullable|string',
            'odds' => 'required|numeric|min:0.01',
            'size' => 'nullable|numeric|min:0',
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
        $size = floatval($request->size ?? 100);
        $betType = $request->bet_type;
        $marketType = strtolower($request->market_type ?? 'match_odds');

        // Calculate profit and liability based on market type
        $calculation = $this->calculateProfitLiability($marketType, $betType, $stake, $odds, $size);
        $liability = $calculation['liability'];
        $potentialProfit = $calculation['profit'];

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

            // Generate random 8-digit market ID for API and tracking
            $apiMarketId = (string) rand(10000000, 99999999);
            
            // Use original market_type from request for API (preserve exact casing)
            $originalMarketType = $request->market_type ?? 'MATCH_ODDS';

            $bet = Bet::create([
                'user_id' => $user->id,
                'market_id' => $apiMarketId,
                'event_id' => $request->event_id,
                'event_name' => $request->event_name,
                'market_name' => $request->market_name,
                'selection_name' => $request->selection_name,
                'selection_id' => $request->selection_id,
                'sport_type' => $sportType,
                'bet_type' => $betType,
                'market_type' => $marketType,
                'odds' => $odds,
                'size' => $size,
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
            
            // Save to results table for result tracking (same market_id)
            $result = Result::create([
                'bet_id' => $bet->id,
                'user_id' => $user->id,
                'event_id' => $request->event_id,
                'event_name' => $request->event_name,
                'market_id' => $apiMarketId,
                'market_name' => $request->market_name,
                'market_type' => $originalMarketType,
                'selection_name' => $request->selection_name,
                'odds' => $odds,
                'stake' => $stake,
                'settled' => 0,
                'placed_at' => now(),
            ]);

            // Make POST request to CricketID API
            $apiKey = env('CRICKETID_API_KEY');
            if ($apiKey) {
                try {
                    $apiResponse = Http::timeout(10)->post("https://api.cricketid.xyz/placed_bets?key={$apiKey}", [
                        'event_id' => $request->event_id,
                        'event_name' => $request->event_name,
                        'market_id' => $apiMarketId,
                        'market_name' => $request->market_name,
                        'market_type' => $originalMarketType,
                    ]);
                    
                    Log::info('CricketID API response: ' . $apiResponse->body());
                } catch (\Exception $apiError) {
                    Log::warning('CricketID API call failed: ' . $apiError->getMessage());
                }
            }

            DB::commit();

            $totalLiability = Bet::where('user_id', $user->id)
                ->whereIn('status', ['pending', 'matched'])
                ->sum('liability');

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
                'total_liability' => $totalLiability,
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

            $totalLiability = Bet::where('user_id', $user->id)
                ->whereIn('status', ['pending', 'matched'])
                ->sum('liability');

            return response()->json([
                'success' => true,
                'message' => 'Bet cancelled successfully',
                'refund_amount' => $refundAmount,
                'new_balance' => $newBalance,
                'total_liability' => $totalLiability,
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

    /**
     * Calculate profit and liability based on market type
     * 
     * Market Types:
     * - match_odds, oddeven, tied_match, decimal: Decimal odds (profit = stake × (odds - 1))
     * - bookmaker: Points/rate per 100 (profit = stake × (odds / 100))
     * - line, over by over, ball by ball: 1:1 payout (profit = stake)
     * - fancy, normal, meter, khado, fancy1: Session with size as rate (profit = stake × (size / 100))
     */
    private function calculateProfitLiability(string $marketType, string $betType, float $stake, float $odds, float $size = 100): array
    {
        $profit = 0;
        $liability = 0;
        $marketTypeLower = strtolower($marketType);

        if ($marketTypeLower === 'bookmaker') {
            // Bookmaker: odds are in points (e.g., 42 means 42% profit)
            if ($betType === 'back') {
                $profit = $stake * ($odds / 100);
                $liability = $stake;
            } else {
                $profit = $stake;
                $liability = $stake * ($odds / 100);
            }
        } elseif ($marketTypeLower === 'line' || str_contains($marketTypeLower, 'line') || str_contains($marketTypeLower, 'over by over') || str_contains($marketTypeLower, 'ball by ball')) {
            // Line markets: 1:1 payout (profit = stake)
            $profit = $stake;
            $liability = $stake;
        } elseif (in_array($marketTypeLower, ['fancy', 'normal', 'meter', 'khado', 'fancy1'])) {
            // Fancy/Session markets: size is the rate
            if ($betType === 'back') {
                $profit = $stake * ($size / 100);
                $liability = $stake;
            } else {
                $profit = $stake;
                $liability = $stake * ($size / 100);
            }
        } else {
            // Match Odds, Odd Even, Tied Match: standard decimal odds
            if ($betType === 'back') {
                $profit = $stake * ($odds - 1);
                $liability = $stake;
            } else {
                $profit = $stake;
                $liability = $stake * ($odds - 1);
            }
        }

        return [
            'profit' => round($profit, 2),
            'liability' => round($liability, 2),
        ];
    }
}
