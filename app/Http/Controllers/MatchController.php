<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MatchController extends Controller
{
    private $baseUrl = 'http://89.116.20.218:8085/api';
    
    public function show($marketId)
    {
        $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
        
        if (!$apiKey) {
            return view('management.cricket.match')->with('error', 'API key not configured');
        }
        
        try {
            // Step 1: Fetch market details to get event ID and runner names
            $marketDetails = $this->getMarketDetails($apiKey, $marketId);
            
            if (!$marketDetails) {
                return view('management.cricket.match')->with('error', 'Failed to fetch market details');
            }
            
            $eventId = $marketDetails['eventId'] ?? null;
            
            if (!$eventId) {
                return view('management.cricket.match')->with('error', 'Event ID not found');
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
            
            return view('management.cricket.match', [
                'marketId' => $marketId,
                'eventId' => $eventId,
                'marketDetails' => $marketDetails,
                'allMarketIds' => $allMarketIds,
                'marketsData' => $marketsData
            ]);
            
        } catch (\Exception $e) {
            return view('management.cricket.match')->with('error', 'Error: ' . $e->getMessage());
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
                // Extract market IDs from the response
                if (is_array($data)) {
                    return $data;
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
}
