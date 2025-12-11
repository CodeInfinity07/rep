<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MatchController extends Controller
{
    private $baseUrl = 'http://89.116.20.218:8085/api';
    private $pricesApiUrl = 'https://prices9.mgs11.com/api/Markets/Data';
    private $cricketIdApiUrl = 'https://api.cricketid.xyz';
    
    private function getCricketIdApiKey()
    {
        return $_SERVER['CRICKETID_API_KEY'] ?? $_ENV['CRICKETID_API_KEY'] ?? getenv('CRICKETID_API_KEY') ?? env('CRICKETID_API_KEY');
    }
    
    public function show($marketId)
    {
        if (!\Auth::check()) {
            return redirect('/login');
        }
        
        $user = \Auth::user();
        $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
        
        $errorView = strtolower($user->type) === 'bettor' ? 'bettor.match' : 'management.cricket.match';
        
        if (!$apiKey) {
            return view($errorView)->with(['error' => 'API key not configured', 'balance' => $user->balance ?? 0, 'liable' => 0, 'active_bets' => 0, 'username' => $user->username ?? '', 'marketId' => $marketId, 'eventName' => '', 'runners' => [], 'odds' => [], 'inPlay' => false]);
        }
        
        try {
            // Step 1: Fetch market details to get event ID and runner names
            $marketDetails = $this->getMarketDetails($apiKey, $marketId);
            
            if (!$marketDetails) {
                return view($errorView)->with(['error' => 'Failed to fetch market details', 'balance' => $user->balance ?? 0, 'liable' => 0, 'active_bets' => 0, 'username' => $user->username ?? '', 'marketId' => $marketId, 'eventName' => '', 'runners' => [], 'odds' => [], 'inPlay' => false]);
            }
            
            // Extract event ID from nested event object
            $eventId = $marketDetails['event']['id'] ?? null;
            
            if (!$eventId) {
                return view($errorView)->with(['error' => 'Event ID not found', 'balance' => $user->balance ?? 0, 'liable' => 0, 'active_bets' => 0, 'username' => $user->username ?? '', 'marketId' => $marketId, 'eventName' => '', 'runners' => [], 'odds' => [], 'inPlay' => false]);
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
                'useCricketIdApi' => true,
                'gmid' => $marketId,
                'sid' => 4,
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
            return view($errorView)->with(['error' => 'Error: ' . $e->getMessage(), 'balance' => $user->balance ?? 0, 'liable' => 0, 'active_bets' => 0, 'username' => $user->username ?? '', 'marketId' => $marketId, 'eventName' => '', 'runners' => [], 'odds' => [], 'inPlay' => false]);
        }
    }
    
    public function showSoccerMatch($gmid, Request $request)
    {
        $request->merge(['sid' => 1]);
        return $this->showCricketIdMatch($gmid, $request);
    }
    
    public function showTennisMatch($gmid, Request $request)
    {
        $request->merge(['sid' => 2]);
        return $this->showCricketIdMatch($gmid, $request);
    }
    
    public function showCricketIdMatch($gmid, Request $request)
    {
        if (!\Auth::check()) {
            return redirect('/login');
        }
        
        $user = \Auth::user();
        $sid = $request->query('sid', 4);
        $errorView = strtolower($user->type) === 'bettor' ? 'bettor.match' : 'management.cricket.match';
        
        try {
            $matchDetails = $this->getCricketIdMatchDetails($gmid, $sid) ?? [];
            $oddsData = $this->getCricketIdOddsData($gmid, $sid) ?? [];
            
            $eventName = $matchDetails['ename'] ?? $matchDetails['name'] ?? 'Match ' . $gmid;
            $eventId = $matchDetails['eid'] ?? $gmid;
            $gtv = $matchDetails['gtv'] ?? null;
            $marketStartTime = $matchDetails['stime'] ?? null;
            
            $inPlay = false;
            $runners = [];
            
            $markets = $oddsData['data'] ?? $oddsData['t1'] ?? [];
            
            if (is_array($markets)) {
                foreach ($markets as $market) {
                    $gtype = $market['gtype'] ?? '';
                    $mname = $market['mname'] ?? '';
                    
                    if (isset($market['iplay'])) {
                        $inPlay = (bool)$market['iplay'];
                    }
                    
                    if (!$gtv && isset($market['gtv'])) {
                        $gtv = $market['gtv'];
                    }
                    
                    if (empty($eventName) || $eventName === 'Match ' . $gmid) {
                        if (isset($market['ename'])) {
                            $eventName = $market['ename'];
                        }
                    }
                    
                    if ($gtype === 'match' && ($mname === 'MATCH_ODDS' || stripos($mname, 'Match Odds') !== false)) {
                        foreach ($market['section'] ?? [] as $section) {
                            $runners[] = [
                                'selectionId' => $section['sid'] ?? $section['nat'] ?? 0,
                                'runnerName' => $section['nat'] ?? 'Unknown'
                            ];
                        }
                        break;
                    }
                }
            }
            
            $activeBetsData = \DB::table('bets')
                ->where('user_id', $user->id)
                ->whereIn('status', ['pending', 'matched'])
                ->select(
                    \DB::raw('COUNT(*) as count'),
                    \DB::raw('COALESCE(SUM(liability), 0) as total_liability')
                )
                ->first();
            
            $scoreCardUrl = $gtv ? '/api/cricketid/score?gtv=' . $gtv . '&sid=' . $sid : null;
            
            $viewData = [
                'marketId' => $gmid,
                'gmid' => $gmid,
                'sid' => $sid,
                'eventId' => $eventId,
                'eventName' => $eventName,
                'runners' => $runners,
                'odds' => [],
                'marketStartTime' => $marketStartTime,
                'inPlay' => $inPlay,
                'marketDetails' => $matchDetails,
                'allMarketIds' => [],
                'marketsData' => [],
                'username' => $user->username,
                'credit' => $user->credit_remaining ?? 0,
                'balance' => $user->balance ?? 0,
                'liable' => $activeBetsData->total_liability ?? 0,
                'active_bets' => $activeBetsData->count ?? 0,
                'scoreCardUrl' => $scoreCardUrl,
                'useCricketIdApi' => true,
                'gtv' => $gtv,
            ];
            
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
            \Log::error('CricketID Match page error: ' . $e->getMessage());
            return view($errorView)->with(['error' => 'Error loading match: ' . $e->getMessage(), 'balance' => $user->balance ?? 0, 'liable' => 0, 'active_bets' => 0, 'username' => $user->username ?? '', 'marketId' => $gmid, 'eventName' => '', 'runners' => [], 'odds' => [], 'inPlay' => false]);
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
    
    private function getCricketIdMatchList($sid = 4)
    {
        try {
            $apiKey = $this->getCricketIdApiKey();
            if (!$apiKey) {
                \Log::error('CricketID API key not configured');
                return null;
            }
            
            $url = $this->cricketIdApiUrl . '/esid?sid=' . $sid . '&key=' . $apiKey;
            $response = Http::timeout(10)->get($url);
            
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            \Log::error('CricketID Match List API error: ' . $e->getMessage());
        }
        
        return null;
    }
    
    private function getCricketIdMatchDetails($gmid, $sid = 4)
    {
        try {
            $apiKey = $this->getCricketIdApiKey();
            if (!$apiKey) {
                \Log::error('CricketID API key not configured');
                return null;
            }
            
            $url = $this->cricketIdApiUrl . '/getDetailsData?gmid=' . $gmid . '&sid=' . $sid . '&key=' . $apiKey;
            $response = Http::timeout(10)->get($url);
            
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            \Log::error('CricketID Match Details API error: ' . $e->getMessage());
        }
        
        return null;
    }
    
    private function getCricketIdOddsData($gmid, $sid = 4)
    {
        try {
            $apiKey = $this->getCricketIdApiKey();
            if (!$apiKey) {
                \Log::error('CricketID API key not configured');
                return null;
            }
            
            $url = $this->cricketIdApiUrl . '/getPriveteData?gmid=' . $gmid . '&sid=' . $sid . '&key=' . $apiKey;
            $response = Http::timeout(10)->get($url);
            
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            \Log::error('CricketID Odds API error: ' . $e->getMessage());
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
                
                // Determine if match is in play
                // ONLY set true if explicitly provided by external API - never assume based on market count
                $isInPlay = false;
                if (isset($marketBooks[0]['inPlay']) && $marketBooks[0]['inPlay'] === true) {
                    $isInPlay = true;
                } elseif (isset($marketBooks[0]['isInPlay']) && $marketBooks[0]['isInPlay'] === true) {
                    $isInPlay = true;
                } elseif (isset($data['inPlay']) && $data['inPlay'] === true) {
                    $isInPlay = true;
                } elseif (isset($data['isInPlay']) && $data['isInPlay'] === true) {
                    $isInPlay = true;
                }
                // Never assume inPlay based on market count - Bookmaker/Fancy can exist pre-match
                
                // Extract Match Odds (marketBooks[0])
                $matchOdds = null;
                if (isset($marketBooks[0])) {
                    $market = $marketBooks[0];
                    $matchOdds = [
                        'marketId' => $market['id'] ?? $marketId,
                        'marketName' => 'Match Odds',
                        'status' => $market['marketStatus'] ?? 'OPEN',
                        'inPlay' => $isInPlay,
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
    
    public function getCricketIdMatchListApi(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $sid = $request->query('sid', 4);
        $data = $this->getCricketIdMatchList($sid);
        
        if ($data) {
            return response()->json(['success' => true, 'data' => $data]);
        }
        
        return response()->json(['error' => 'No data available'], 404);
    }
    
    public function getCricketIdOddsApi(Request $request, $gmid)
    {
        if (!\Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $sid = $request->query('sid', 4);
        
        try {
            $data = $this->getCricketIdOddsData($gmid, $sid);
            
            if (!$data) {
                return response()->json(['error' => 'No data available from CricketID API'], 404);
            }
            
            $matchOdds = null;
            $bookmaker = null;
            $fancy = [];
            $allFancy = [];
            $isInPlay = false;
            $scores = [];
            
            $markets = $data['data'] ?? [];
            
            foreach ($markets as $market) {
                $marketName = $market['mname'] ?? '';
                $gtype = $market['gtype'] ?? '';
                $marketStatus = $market['status'] ?? 'SUSPENDED';
                
                if ($gtype === 'match' && ($marketName === 'MATCH_ODDS' || stripos($marketName, 'Match Odds') !== false)) {
                    $isInPlay = isset($market['iplay']) ? (bool)$market['iplay'] : false;
                    $matchOdds = [
                        'marketId' => $market['mid'] ?? '',
                        'marketName' => $marketName ?: 'Match Odds',
                        'status' => $marketStatus,
                        'inPlay' => $isInPlay,
                        'runners' => []
                    ];
                    
                    foreach ($market['section'] ?? [] as $section) {
                        $status = $section['gstatus'] ?? 'ACTIVE';
                        $odds = $section['odds'] ?? [];
                        
                        $back1 = null; $back2 = null; $back3 = null;
                        $lay1 = null; $lay2 = null; $lay3 = null;
                        $bs1 = null; $bs2 = null; $bs3 = null;
                        $ls1 = null; $ls2 = null; $ls3 = null;
                        
                        foreach ($odds as $odd) {
                            $oname = $odd['oname'] ?? '';
                            $price = $odd['odds'] ?? 0;
                            $size = $odd['size'] ?? 0;
                            
                            if ($oname === 'back1') { $back1 = $price; $bs1 = $size; }
                            elseif ($oname === 'back2') { $back2 = $price; $bs2 = $size; }
                            elseif ($oname === 'back3') { $back3 = $price; $bs3 = $size; }
                            elseif ($oname === 'lay1') { $lay1 = $price; $ls1 = $size; }
                            elseif ($oname === 'lay2') { $lay2 = $price; $ls2 = $size; }
                            elseif ($oname === 'lay3') { $lay3 = $price; $ls3 = $size; }
                        }
                        
                        $matchOdds['runners'][] = [
                            'selectionId' => $section['sid'] ?? 0,
                            'name' => $section['nat'] ?? 'Unknown',
                            'status' => $status,
                            'price1' => $back1,
                            'price2' => $back2,
                            'price3' => $back3,
                            'size1' => $bs1,
                            'size2' => $bs2,
                            'size3' => $bs3,
                            'lay1' => $lay1,
                            'lay2' => $lay2,
                            'lay3' => $lay3,
                            'ls1' => $ls1,
                            'ls2' => $ls2,
                            'ls3' => $ls3
                        ];
                    }
                } elseif ($gtype === 'match1' || stripos($marketName, 'Bookmaker') !== false) {
                    $bookmaker = [
                        'marketId' => $market['mid'] ?? '',
                        'marketName' => $marketName ?: 'Bookmaker',
                        'status' => $marketStatus,
                        'runners' => []
                    ];
                    
                    foreach ($market['section'] ?? [] as $section) {
                        $status = $section['gstatus'] ?? 'ACTIVE';
                        $odds = $section['odds'] ?? [];
                        
                        $back1 = null; $lay1 = null; $bs1 = null; $ls1 = null;
                        
                        foreach ($odds as $odd) {
                            $oname = $odd['oname'] ?? '';
                            if ($oname === 'back1') { $back1 = $odd['odds'] ?? 0; $bs1 = $odd['size'] ?? 0; }
                            elseif ($oname === 'lay1') { $lay1 = $odd['odds'] ?? 0; $ls1 = $odd['size'] ?? 0; }
                        }
                        
                        $bookmaker['runners'][] = [
                            'selectionId' => $section['sid'] ?? 0,
                            'name' => $section['nat'] ?? 'Unknown',
                            'status' => $status,
                            'price1' => $back1,
                            'size1' => $bs1,
                            'lay1' => $lay1,
                            'ls1' => $ls1
                        ];
                    }
                } else {
                    // Capture all other market types (session, fancy, oddeven, meter, khado, tied_match, etc.)
                    $fancyMarket = [
                        'marketId' => $market['mid'] ?? '',
                        'marketName' => $marketName,
                        'status' => $marketStatus,
                        'runners' => []
                    ];
                    
                    foreach ($market['section'] ?? [] as $section) {
                        $status = $section['gstatus'] ?? 'ACTIVE';
                        $odds = $section['odds'] ?? [];
                        
                        $back1 = null; $lay1 = null; $bs1 = null; $ls1 = null;
                        
                        foreach ($odds as $odd) {
                            $oname = $odd['oname'] ?? '';
                            if ($oname === 'back1') { $back1 = $odd['odds'] ?? 0; $bs1 = $odd['size'] ?? 0; }
                            elseif ($oname === 'lay1') { $lay1 = $odd['odds'] ?? 0; $ls1 = $odd['size'] ?? 0; }
                        }
                        
                        $fancyMarket['runners'][] = [
                            'selectionId' => $section['sid'] ?? 0,
                            'name' => $section['nat'] ?? $marketName,
                            'status' => $status,
                            'price1' => $back1,
                            'size1' => $bs1,
                            'lay1' => $lay1,
                            'ls1' => $ls1
                        ];
                    }
                    
                    $fancy[] = $fancyMarket;
                }
                
                $allFancy[] = [
                    'marketId' => $market['mid'] ?? '',
                    'marketName' => $marketName,
                    'gtype' => $gtype,
                    'status' => $marketStatus
                ];
            }
            
            if (isset($data['t3']) && is_array($data['t3'])) {
                foreach ($data['t3'] as $market) {
                    $marketName = $market['mname'] ?? 'Fancy';
                    $fancyMarket = [
                        'marketId' => $market['mid'] ?? '',
                        'marketName' => $marketName,
                        'status' => isset($market['status']) && $market['status'] == 1 ? 'OPEN' : 'SUSPENDED',
                        'runners' => []
                    ];
                    
                    foreach ($market['section'] ?? [] as $section) {
                        $status = 'ACTIVE';
                        if (isset($section['gstatus']) && $section['gstatus'] != '') {
                            $status = $section['gstatus'];
                        }
                        
                        $fancyMarket['runners'][] = [
                            'selectionId' => $section['sid'] ?? 0,
                            'name' => $section['nat'] ?? $marketName,
                            'status' => $status,
                            'price1' => isset($section['b1']) ? floatval($section['b1']) : null,
                            'size1' => isset($section['bs1']) ? floatval($section['bs1']) : null,
                            'lay1' => isset($section['l1']) ? floatval($section['l1']) : null,
                            'ls1' => isset($section['ls1']) ? floatval($section['ls1']) : null
                        ];
                    }
                    
                    $fancy[] = $fancyMarket;
                }
            }
            
            $scores = [];
            if (isset($data['score'])) {
                $scores = $data['score'];
            }
            
            return response()->json([
                'success' => true,
                'matchOdds' => $matchOdds,
                'bookmaker' => $bookmaker,
                'fancy' => count($fancy) > 0 ? $fancy[0] : null,
                'allFancy' => $fancy,
                'scores' => $scores,
                'inPlay' => $isInPlay,
                'raw' => $data
            ]);
            
        } catch (\Exception $e) {
            \Log::error('CricketID Odds API error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getCricketIdScoreProxy(Request $request)
    {
        if (!\Auth::check()) {
            return response('Unauthorized', 401);
        }
        
        $gtv = $request->query('gtv');
        $sid = $request->query('sid', 4);
        
        if (!$gtv) {
            return response('Missing gtv parameter', 400);
        }
        
        $apiKey = $this->getCricketIdApiKey();
        if (!$apiKey) {
            return response('API key not configured', 500);
        }
        
        $url = $this->cricketIdApiUrl . '/score?gtv=' . $gtv . '&sid=' . $sid . '&key=' . $apiKey;
        
        try {
            $response = Http::timeout(10)->get($url);
            
            if ($response->successful()) {
                $contentType = $response->header('Content-Type') ?? 'text/html';
                return response($response->body())
                    ->header('Content-Type', $contentType)
                    ->header('Cache-Control', 'no-cache, no-store, must-revalidate');
            }
            
            return response('Score data not available', 404);
        } catch (\Exception $e) {
            \Log::error('CricketID Score API error: ' . $e->getMessage());
            return response('Error fetching score', 500);
        }
    }
    
    public function getMatchDetailsFromDb(Request $request, $gmid)
    {
        if (!\Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        try {
            $match = \DB::table('matches')
                ->where('gmid', $gmid)
                ->first();
            
            if (!$match) {
                return response()->json(['error' => 'Match not found'], 404);
            }
            
            $todayStart = now()->startOfDay();
            $todayEnd = now()->endOfDay();
            
            $relatedMatches = \DB::table('matches')
                ->where('sport_id', $match->sport_id)
                ->where('gmid', '!=', $gmid)
                ->where('is_inplay', false)
                ->whereBetween('scheduled_time', [$todayStart, $todayEnd])
                ->orderBy('scheduled_time', 'asc')
                ->limit(10)
                ->get();
            
            $scheduledTime = $match->scheduled_time ? strtotime($match->scheduled_time) * 1000 : null;
            
            return response()->json([
                'success' => true,
                'match' => [
                    'gmid' => $match->gmid,
                    'matchName' => $match->match_name,
                    'competitionName' => $match->competition_name,
                    'isInplay' => (bool)$match->is_inplay,
                    'isLive' => (bool)$match->is_live,
                    'scheduledTime' => $scheduledTime,
                    'scheduledTimeFormatted' => $match->scheduled_time ? date('H:i', strtotime($match->scheduled_time)) : null,
                    'status' => $match->match_status,
                    'sportId' => $match->sport_id
                ],
                'relatedMatches' => $relatedMatches->map(function($m) {
                    return [
                        'gmid' => $m->gmid,
                        'matchName' => $m->match_name,
                        'scheduledTime' => $m->scheduled_time ? date('H:i', strtotime($m->scheduled_time)) : null,
                        'isInplay' => (bool)$m->is_inplay
                    ];
                })
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Match details from DB error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getResultsApi(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        try {
            $sportId = $request->input('sport_id', 4);
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            
            $query = \DB::table('match_results')
                ->where('sport_id', $sportId);
            
            if ($fromDate) {
                $query->where('result_date', '>=', $fromDate);
            }
            
            if ($toDate) {
                $query->where('result_date', '<=', $toDate);
            }
            
            $results = $query->orderBy('result_date', 'desc')
                ->limit(100)
                ->get();
            
            return response()->json([
                'success' => true,
                'data' => $results->map(function($r) {
                    return [
                        'id' => $r->id,
                        'gmid' => $r->gmid,
                        'matchName' => $r->match_name,
                        'marketName' => $r->market_name,
                        'resultDate' => date('Y-m-d H:i', strtotime($r->result_date)),
                        'winner' => $r->winner
                    ];
                })
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Results API error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
