<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MatchController extends Controller
{
    private $baseUrl = 'http://89.116.20.218:8085/api';
    private $pricesApiUrl = 'https://prices9.mgs11.com/api/Markets/Data';
    
    public function show($marketId)
    {
        if (!\Auth::check()) {
            return redirect('/login');
        }
        
        $user = \Auth::user();
        $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
        
        $errorView = strtolower($user->type) === 'bettor' ? 'bettor.match' : 'management.cricket.match';
        
        if (!$apiKey) {
            return view($errorView)->with('error', 'API key not configured');
        }
        
        try {
            // Step 1: Fetch market details to get event ID and runner names
            $marketDetails = $this->getMarketDetails($apiKey, $marketId);
            
            if (!$marketDetails) {
                return view($errorView)->with('error', 'Failed to fetch market details');
            }
            
            // Extract event ID from nested event object
            $eventId = $marketDetails['event']['id'] ?? null;
            
            if (!$eventId) {
                return view($errorView)->with('error', 'Event ID not found');
            }
            
            // Step 2: Fetch all market IDs for this event
            $allMarketIds = $this->getMarketIdsForEvent($apiKey, $eventId);
            
            // Step 3: Fetch odds for all markets
            $marketsData = [];
            foreach ($allMarketIds as $mktId) {
                $oddsData = $this->getMarketOdds($apiKey, $mktId);
                if ($oddsData) {
                    $marketsData[$mktId] = $oddsData;
                }
            }
            
            // Calculate active bets count and total liability
            $activeBetsData = \DB::table('bets')
                ->where('user_id', $user->id)
                ->whereIn('status', ['pending', 'matched'])
                ->select(
                    \DB::raw('COUNT(*) as count'),
                    \DB::raw('COALESCE(SUM(liability), 0) as total_liability')
                )
                ->first();
            
            // Extract event name and runners from market details
            $eventName = $marketDetails['event']['name'] ?? $marketDetails['marketName'] ?? 'Match';
            $runners = $marketDetails['runners'] ?? [];
            
            // Extract market start time and inPlay status
            $marketStartTime = $marketDetails['marketStartTime'] ?? $marketDetails['event']['openDate'] ?? null;
            
            // Get odds for the main market (Match Odds)
            $mainMarketOdds = $marketsData[$marketId] ?? [];
            $odds = $mainMarketOdds['runners'] ?? [];
            
            // Check multiple paths for inPlay status
            $inPlay = false;
            if (isset($marketDetails['inPlay'])) {
                $inPlay = $marketDetails['inPlay'];
            } elseif (isset($mainMarketOdds['inPlay'])) {
                $inPlay = $mainMarketOdds['inPlay'];
            } elseif (isset($marketDetails['inplay'])) {
                $inPlay = $marketDetails['inplay'];
            } elseif (isset($marketDetails['isInPlay'])) {
                $inPlay = $marketDetails['isInPlay'];
            } elseif (isset($marketDetails['status']) && $marketDetails['status'] === 'OPEN') {
                // If status is OPEN and market has started, it's likely inPlay
                if ($marketStartTime) {
                    $startTime = strtotime($marketStartTime);
                    $inPlay = $startTime && $startTime <= time();
                }
            }
            
            // Force inPlay if market start time has passed
            if (!$inPlay && $marketStartTime) {
                $startTime = strtotime($marketStartTime);
                if ($startTime && $startTime <= time()) {
                    $inPlay = true;
                }
            }
            
            $scoreCardUrl = 'https://score.akamaized.uk/live-src?id=' . $eventId;
            
            $viewData = [
                'marketId' => $marketId,
                'eventId' => $eventId,
                'eventName' => $eventName,
                'runners' => $runners,
                'odds' => $odds,
                'marketStartTime' => $marketStartTime,
                'inPlay' => $inPlay,
                'marketDetails' => $marketDetails,
                'allMarketIds' => $allMarketIds,
                'marketsData' => $marketsData,
                'username' => $user->username,
                'credit' => $user->credit_remaining ?? 0,
                'balance' => $user->balance ?? 0,
                'liable' => $activeBetsData->total_liability ?? 0,
                'active_bets' => $activeBetsData->count ?? 0,
                'scoreCardUrl' => $scoreCardUrl,
            ];
            
            // Serve bettor or management view based on user role
            if (strtolower($user->type) === 'bettor') {
                return response()
                    ->view('bettor.match', $viewData)
                    ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', '0');
            }
            
            return response()
                ->view('management.cricket.match', $viewData)
                ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
            
        } catch (\Exception $e) {
            return view($errorView)->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    private function getMarketDetails($apiKey, $marketId)
    {
        try {
            $url = $this->baseUrl . '/GetMarketDetails';
            $response = Http::withHeaders([
                'X-ScoreSwift-Key' => $apiKey
            ])->timeout(10)->get($url, [
                'market_id' => $marketId
            ]);
            
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            // Log error if needed
        }
        
        return null;
    }
    
    private function getMarketIdsForEvent($apiKey, $eventId)
    {
        try {
            $url = $this->baseUrl . '/GetMarketIdsV1';
            $response = Http::withHeaders([
                'X-ScoreSwift-Key' => $apiKey
            ])->timeout(10)->get($url, [
                'eventid' => $eventId
            ]);
            
            if ($response->successful()) {
                $data = $response->json();
                
                // Case 1: Nested structure: competition.event.markets[]
                if (isset($data['competition']['event']['markets']) && is_array($data['competition']['event']['markets'])) {
                    $marketIds = [];
                    foreach ($data['competition']['event']['markets'] as $market) {
                        if (isset($market['marketId'])) {
                            $marketIds[] = $market['marketId'];
                        }
                    }
                    if (!empty($marketIds)) {
                        return $marketIds;
                    }
                }
                
                // Case 2: Array of market ID strings ["1.250716982", "9.20529268", ...]
                if (is_array($data) && isset($data[0]) && is_string($data[0])) {
                    return $data;
                }
                
                // Case 3: Array of objects [{"marketId": "1.250716982"}, ...]
                if (is_array($data) && isset($data[0]) && is_array($data[0])) {
                    $marketIds = [];
                    foreach ($data as $item) {
                        if (isset($item['marketId'])) {
                            $marketIds[] = $item['marketId'];
                        } elseif (isset($item['id'])) {
                            $marketIds[] = $item['id'];
                        }
                    }
                    if (!empty($marketIds)) {
                        return $marketIds;
                    }
                }
                
                // Case 4: Object with marketIds key {"marketIds": [...]}
                if (isset($data['marketIds']) && is_array($data['marketIds'])) {
                    return $data['marketIds'];
                }
                
                // Case 5: Object with markets key {"markets": [...]}
                if (isset($data['markets']) && is_array($data['markets'])) {
                    $marketIds = [];
                    foreach ($data['markets'] as $market) {
                        if (is_string($market)) {
                            $marketIds[] = $market;
                        } elseif (is_array($market) && isset($market['marketId'])) {
                            $marketIds[] = $market['marketId'];
                        } elseif (is_array($market) && isset($market['id'])) {
                            $marketIds[] = $market['id'];
                        }
                    }
                    if (!empty($marketIds)) {
                        return $marketIds;
                    }
                }
            }
        } catch (\Exception $e) {
            // Log error if needed
        }
        
        return [];
    }
    
    private function getMarketOdds($apiKey, $marketId)
    {
        try {
            $url = $this->baseUrl . '/GetMarketOdds';
            $response = Http::withHeaders([
                'X-ScoreSwift-Key' => $apiKey
            ])->timeout(10)->get($url, [
                'market_id' => $marketId
            ]);
            
            if ($response->successful()) {
                $data = $response->json();
                // API returns an array, extract first element
                if (is_array($data) && !empty($data)) {
                    return $data[0];
                }
            }
        } catch (\Exception $e) {
            // Log error if needed
        }
        
        return null;
    }
    
    public function getOddsApi($marketId)
    {
        $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
        
        if (!$apiKey) {
            return response()->json(['error' => 'API key not configured'], 500);
        }
        
        try {
            $oddsData = $this->getMarketOdds($apiKey, $marketId);
            
            if ($oddsData) {
                return response()->json($oddsData);
            }
            
            return response()->json(['error' => 'No data available'], 404);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getMarketDetailsApi($marketId)
    {
        $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
        
        if (!$apiKey) {
            return response()->json(['error' => 'API key not configured'], 500);
        }
        
        try {
            $details = $this->getMarketDetails($apiKey, $marketId);
            
            if ($details) {
                return response()->json($details);
            }
            
            return response()->json(['error' => 'No data available'], 404);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    private function getPricesData($marketId)
    {
        try {
            $token = $_SERVER['MGS_API_TOKEN'] ?? $_ENV['MGS_API_TOKEN'] ?? getenv('MGS_API_TOKEN') ?? env('MGS_API_TOKEN');
            
            if (!$token) {
                \Log::error('MGS API token not configured');
                return null;
            }
            
            $url = $this->pricesApiUrl . '?id=' . $marketId . '&token=' . $token;
            
            $response = Http::timeout(10)->get($url);
            
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            \Log::error('Prices API error: ' . $e->getMessage());
        }
        
        return null;
    }
    
    public function getPricesApi($marketId)
    {
        if (!\Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        try {
            $data = $this->getPricesData($marketId);
            
            if ($data) {
                // Parse marketBooks array: [0]=Match Odds, [1]=Bookmaker, [2]=Fancy/Fancy-2
                $marketBooks = $data['marketBooks'] ?? [];
                
                $parsedData = [
                    'matchOdds' => $marketBooks[0] ?? null,
                    'bookmaker' => $marketBooks[1] ?? null,
                    'fancy' => $marketBooks[2] ?? null,
                    'raw' => $data
                ];
                
                return response()->json([
                    'success' => true,
                    'data' => $parsedData
                ]);
            }
            
            return response()->json(['error' => 'No data available'], 404);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getAllPricesApi($marketId)
    {
        if (!\Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        try {
            $data = $this->getPricesData($marketId);
            
            if ($data) {
                // Parse marketBooks array: [0]=Match Odds, [1]=Bookmaker, [2]=Fancy/Fancy-2
                $marketBooks = $data['marketBooks'] ?? [];
                $scores = $data['scores'] ?? [];
                
                // Get team names from scores object
                $homeTeam = $scores['home'] ?? 'Team 1';
                $awayTeam = $scores['away'] ?? 'Team 2';
                
                // Extract Match Odds (marketBooks[0])
                $matchOdds = null;
                if (isset($marketBooks[0])) {
                    $market = $marketBooks[0];
                    $matchOdds = [
                        'marketId' => $market['id'] ?? $marketId,
                        'marketName' => 'Match Odds',
                        'status' => $market['marketStatus'] ?? 'OPEN',
                        'inPlay' => $market['bettingAllowed'] ?? false,
                        'runners' => []
                    ];
                    
                    $runnerIndex = 0;
                    foreach ($market['runners'] ?? [] as $runner) {
                        // Map runner index to team name: 0=Home, 1=Away, 2=Draw
                        $runnerName = 'Unknown';
                        if ($runnerIndex === 0) $runnerName = $homeTeam;
                        elseif ($runnerIndex === 1) $runnerName = $awayTeam;
                        elseif ($runnerIndex === 2) $runnerName = 'The Draw';
                        
                        $matchOdds['runners'][] = [
                            'selectionId' => $runner['id'] ?? 0,
                            'name' => $runnerName,
                            'status' => $runner['status'] ?? 'ACTIVE',
                            'price1' => $runner['price1'] ?? null,
                            'price2' => $runner['price2'] ?? null,
                            'price3' => $runner['price3'] ?? null,
                            'size1' => $runner['size1'] ?? null,
                            'size2' => $runner['size2'] ?? null,
                            'size3' => $runner['size3'] ?? null,
                            'lay1' => $runner['lay1'] ?? null,
                            'lay2' => $runner['lay2'] ?? null,
                            'lay3' => $runner['lay3'] ?? null,
                            'ls1' => $runner['ls1'] ?? null,
                            'ls2' => $runner['ls2'] ?? null,
                            'ls3' => $runner['ls3'] ?? null
                        ];
                        $runnerIndex++;
                    }
                }
                
                // Extract Bookmaker (marketBooks[1])
                $bookmaker = null;
                if (isset($marketBooks[1])) {
                    $market = $marketBooks[1];
                    $bookmaker = [
                        'marketId' => $market['id'] ?? '',
                        'marketName' => 'Bookmaker',
                        'status' => $market['marketStatus'] ?? 'OPEN',
                        'runners' => []
                    ];
                    
                    $runnerIndex = 0;
                    foreach ($market['runners'] ?? [] as $runner) {
                        $runnerName = 'Unknown';
                        if ($runnerIndex === 0) $runnerName = $homeTeam;
                        elseif ($runnerIndex === 1) $runnerName = $awayTeam;
                        elseif ($runnerIndex === 2) $runnerName = 'The Draw';
                        
                        $bookmaker['runners'][] = [
                            'selectionId' => $runner['id'] ?? 0,
                            'name' => $runnerName,
                            'status' => $runner['status'] ?? 'ACTIVE',
                            'price1' => $runner['price1'] ?? null,
                            'size1' => $runner['size1'] ?? null,
                            'lay1' => $runner['lay1'] ?? null,
                            'ls1' => $runner['ls1'] ?? null
                        ];
                        $runnerIndex++;
                    }
                }
                
                // Extract Fancy/Fancy-2 (marketBooks[2])
                $fancy = null;
                if (isset($marketBooks[2])) {
                    $market = $marketBooks[2];
                    $fancyName = $market['marketName'] ?? $market['name'] ?? 'Fancy';
                    $fancy = [
                        'marketId' => $market['id'] ?? '',
                        'marketName' => $fancyName,
                        'status' => $market['marketStatus'] ?? 'OPEN',
                        'runners' => []
                    ];
                    
                    foreach ($market['runners'] ?? [] as $runner) {
                        $fancy['runners'][] = [
                            'selectionId' => $runner['id'] ?? 0,
                            'name' => $runner['name'] ?? $runner['runnerName'] ?? $fancyName,
                            'status' => $runner['status'] ?? 'ACTIVE',
                            'price1' => $runner['price1'] ?? null,
                            'size1' => $runner['size1'] ?? null,
                            'lay1' => $runner['lay1'] ?? null,
                            'ls1' => $runner['ls1'] ?? null
                        ];
                    }
                }
                
                return response()->json([
                    'success' => true,
                    'matchOdds' => $matchOdds,
                    'bookmaker' => $bookmaker,
                    'fancy' => $fancy,
                    'scores' => $scores,
                    'marketCount' => count($marketBooks)
                ]);
            }
            
            return response()->json(['error' => 'No data available'], 404);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
