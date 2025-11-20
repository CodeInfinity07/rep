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
            $cacheKey = 'match_odds_' . $marketId;
            $cacheDuration = now()->addSeconds(5);
            
            $data = Cache::remember($cacheKey, $cacheDuration, function () use ($apiKey, $marketId) {
                $response = Http::withHeaders([
                    'X-ScoreSwift-Key' => $apiKey
                ])->timeout(10)->get($this->apiUrl, [
                    'market_id' => $marketId
                ]);
                
                if ($response->successful()) {
                    return $response->json();
                }
                
                return null;
            });
            
            if (!$data || !is_array($data) || empty($data)) {
                return view('management.cricket.match')->with('error', 'Failed to fetch match data');
            }
            
            // API returns an array, get the first element
            $matchData = $data[0] ?? null;
            
            if (!$matchData) {
                return view('management.cricket.match')->with('error', 'No match data available');
            }
            
            // Get match name from cricket matches list
            $matchName = $this->getMatchName($apiKey, $marketId);
            
            return view('management.cricket.match', [
                'matchData' => $matchData,
                'marketId' => $marketId,
                'matchName' => $matchName
            ]);
            
        } catch (\Exception $e) {
            return view('management.cricket.match')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    private function getMatchName($apiKey, $marketId)
    {
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
                                return $market['marketName'] ?? 'Match Odds';
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            // Ignore errors, just return default
        }
        
        return 'Match Odds';
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
                return response()->json($response->json());
            }
            return response()->json(['error' => 'Failed to fetch odds'], 500);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
