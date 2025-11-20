<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MatchController extends Controller
{
    private $apiUrl = 'http://89.116.20.218:8085/api/GetMarketOdds';
    
    public function show($marketId)
    {
        $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
        
        if (!$apiKey) {
            return view('management.cricket.match')->with('error', 'API key not configured');
        }
        
        try {
            // Fetch match odds data (no cache for real-time updates)
            $response = Http::withHeaders([
                'X-ScoreSwift-Key' => $apiKey
            ])->timeout(10)->get($this->apiUrl, [
                'market_id' => $marketId
            ]);
            
            if (!$response->successful()) {
                return view('management.cricket.match')->with('error', 'Failed to fetch match data');
            }
            
            $data = $response->json();
            
            if (!$data || !is_array($data) || empty($data)) {
                return view('management.cricket.match')->with('error', 'Failed to fetch match data');
            }
            
            // API returns an array, get the first element
            $matchData = $data[0] ?? null;
            
            if (!$matchData) {
                return view('management.cricket.match')->with('error', 'No match data available');
            }
            
            // Get match metadata and runner names from /api/home
            $matchInfo = $this->getMatchInfo($apiKey, $marketId);
            
            return view('management.cricket.match', [
                'matchData' => $matchData,
                'marketId' => $marketId,
                'matchName' => $matchInfo['matchName'],
                'runnerNames' => $matchInfo['runnerNames']
            ]);
            
        } catch (\Exception $e) {
            return view('management.cricket.match')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    private function getMatchInfo($apiKey, $marketId)
    {
        $defaultInfo = [
            'matchName' => 'Match Odds',
            'runnerNames' => []
        ];
        
        try {
            $homeUrl = 'http://89.116.20.218:8085/api/home';
            $response = Http::withHeaders([
                'X-ScoreSwift-Key' => $apiKey
            ])->timeout(10)->get($homeUrl);
            
            if ($response->successful()) {
                $data = $response->json();
                foreach ($data as $sportCategory) {
                    if (isset($sportCategory['markets']) && strtolower($sportCategory['name'] ?? '') === 'cricket') {
                        foreach ($sportCategory['markets'] as $market) {
                            if (($market['marketId'] ?? '') === $marketId) {
                                $runnerNames = [];
                                
                                // Build runner lookup map: selectionId => runnerName
                                if (isset($market['runners']) && is_array($market['runners'])) {
                                    foreach ($market['runners'] as $runner) {
                                        $selectionId = $runner['selectionId'] ?? null;
                                        $runnerName = $runner['runnerName'] ?? null;
                                        if ($selectionId && $runnerName) {
                                            $runnerNames[$selectionId] = $runnerName;
                                        }
                                    }
                                }
                                
                                return [
                                    'matchName' => $market['marketName'] ?? 'Match Odds',
                                    'runnerNames' => $runnerNames
                                ];
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            // Ignore errors, just return default
        }
        
        return $defaultInfo;
    }
    
    public function getOddsApi($marketId)
    {
        $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
        
        if (!$apiKey) {
            return response()->json(['error' => 'API key not configured'], 500);
        }
        
        try {
            $response = Http::withHeaders([
                'X-ScoreSwift-Key' => $apiKey
            ])->timeout(10)->get($this->apiUrl, [
                'market_id' => $marketId
            ]);
            
            if ($response->successful()) {
                $data = $response->json();
                
                // API returns an array, extract first element
                if (is_array($data) && !empty($data)) {
                    return response()->json($data[0]);
                }
                
                return response()->json(['error' => 'No data available'], 404);
            }
            return response()->json(['error' => 'Failed to fetch odds'], 500);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
